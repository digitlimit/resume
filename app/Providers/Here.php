<?php
namespace App\Providers;

use Digitlimit\Place\Contracts\Place as PlaceContract;
use Illuminate\Support\Collection;
use Digitlimit\Place\Providers\AbstractProvider;
use Illuminate\Http\Request;

class Here extends AbstractProvider implements PlaceContract
{
    protected $results = [];

    protected $status;

    public function __construct(Request $request, $client_id, array $guzzle)
    {
        parent::__construct($request, $client_id, $guzzle);
    }

    /**
     * Perform places text search
     *
     * @param null $query
     * @return PlaceContract
     */
    public function textSearch($query=null) : PlaceContract{
        $this->query = $query;
        return $this;
    }

    /**
     * Perform places NearBy Search
     *
     * @param null $query
     * @return PlaceContract
     */
    public function nearBySearch($query=null) : PlaceContract{
        $this->query = $query;
        return $this;
    }

    /**
     * Fetch Next page from results
     *
     * @param array $parameters
     * @return PlaceContract
     */
    public function getNextPage(array $parameters=[]) : PlaceContract
    {
        //TODO set limit in config file
        return $this;
    }

    public function hasNextPage() : bool
    {
        //TODO set limit in config file
    }


    /**
     * Return JSON result set
     * @return string
     */
    public function toJson() : string{

        $place = $this->getPlace();

        return json_encode($place);
    }

    /**
     * Return Array result set
     * @return array
     */
    public function toArray() : array{
        return $this->getPlace();
    }

    /**
     * Return Collection result set
     * @return Collection
     */
    public function toCollection() : Collection{
        $place = $this->getPlace();

        return collect($place);
    }

    /**
     * Make request to place API
     *
     * @return array
     */
    protected function getPlace()
    {
        $this->response = $this->getPlaceByQuery();

        //on successful request a result is returned
        if(is_array($this->response) && isset($this->response['results'])){
            return $this->transformToPlaceFormat($this->response['results']);
        }

        //TODO: handle different errors
        info($this->response);
    }

    /**
     * Transform response to Place format
     *
     * @param array $results
     * @return array
     */
    protected function transformToPlaceFormat(array $results) : array
    {
        $transformed_results = [];

        foreach($results as $result)
        {
            $transformed_results[] = [
                'name' => $result['poi']['name'],
                'brands' => isset($result['poi']['brands']) ? $result['poi']['brands'] : [],
                'website' => isset($result['poi']['url']) ? $result['poi']['url'] : '',
                'formatted_address' => $result['address']['freeformAddress'],
                'lat' => $result['position']['lat'],
                'lng' => $result['position']['lon'],
                'icon' => '',
                'opening_hours' => '',
                'photos' => [],
                'rating' => '',
                'user_ratings_total' => '',
                'types' => isset($result['poi']['categories']) ? $result['poi']['categories'] : [] //e.g gas station
            ];
        }

        return $transformed_results;
    }

    /**
     * Get API Base Url
     *
     * @param null $path
     * @return string
     */
    protected function getBaseUrl($path=null) : string
    {
        $url = "https://places.cit.api.here.com/places/v1";
        return $path ? $url . "/" . $path : $url;
    }

    /**
     * Get Full API Url
     *
     * @return string
     */
    protected function getFullUrl() : string
    {
        return $this->getBaseUrl("autosuggest");
    }

    /**
     * Build Query
     * @return array
     */
    protected function getPlaceByQuery() : array
    {
        //TODO move to config
        $response = $this->getHttpClient()->get($this->getFullUrl(), [
            'query' =>  $this->buildQuery([
                'q' => $this->getQuery(),
                'app_id' => 'MPmoZcKwFvHeFwHPQVdR',
                'app_code' => 'xrYPcm3moY8_0rlz6T_YJQ',
                'at' => '7.401962,3.917313',
            ])
        ]);

        return (array) json_decode($response->getBody(), true);
    }
}