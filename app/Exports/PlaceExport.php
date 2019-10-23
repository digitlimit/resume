<?php

namespace App\Exports;

use Place;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;


class PlaceExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    protected $query;

    public function __construct($query=null)
    {
        $this->query = $query;
    }

    /**
     * Header
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Formatted Address',
        ];
    }

    public function map($place): array
    {
        return [
            $place['name'],
            $place['formatted_address']
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $stations = $this->getPlaces(request()->input('query'));

        return collect($stations);
    }


    public function getFilename()
    {
        // This is not working :(
        // return $schedule->slug;
        return 'filename';
    }






    protected function stations() : array
    {
        $stations = [];

        foreach($this->states() as $state)
        {
            sleep(4);

            print "Running: gas stations in ". strtolower($state) . "<br>";

            $places = $this->getPlaces("gas stations in $state");

            if(is_array($places)){
                $stations[] = $places;
            }

        }

        return $stations;
    }

    protected function getPlaces($query)
    {
        $place = Place::textSearch($query);

        $places = $place->toArray();

        $results = [];

        if($place->responseHas('next_page_token'))
        {
            $token = $place->getResponse('next_page_token');

            while($token){

                //take a nap so google won't block our request based on rates
                sleep(4);

                //get places with given token
                $place = Place::textSearch()
                    ->with(['next_page_token' => $token]);

                $results[] = $place->toArray();

                if($place->responseHas('next_page_token')){
                    $token = $place->getResponse('next_page_token');
                }else{
                    $token = null;
                }
            }
        }

        foreach($results as $result)
        {
            foreach($result as $r){
                $places[] = $r;
            }
        }

        return $places;
    }

    protected function states() : array
    {
        return [
//            "Abia",
//            "Adamawa",
//            "Anambra",
//            "Akwa Ibom",
//            "Bauchi",
//            "Bayelsa",
//            "Benue",
//            "Borno",
//            "Cross River",
//            "Delta",
//            "Ebonyi",
//            "Enugu",
//            "Edo",
//            "Ekiti",
//            "FCT - Abuja",
//            "Gombe",
//            "Imo",
//            "Jigawa",
//            "Kaduna",
//            "Kano",
//            "Katsina",
//            "Kebbi",
//            "Kogi",
//            "Kwara",
//            "Lagos",
//            "Nasarawa",
//            "Niger",
//            "Ogun",
//            "Ondo",
//            "Osun",
//            "Oyo",
//            "Plateau",
//            "Rivers",
//            "Sokoto",
//            "Taraba",
//            "Yobe",
//            "Zamfara"
        ];
    }
}
