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
        $query = request()->input('query');

        $stations = $this->getPlaces($query);

        return collect($stations);
    }

    protected function getPlaces($query)
    {
        $place = Place::driver('azure')->textSearch($query);

        $places = $place->toArray();

        $results = [];

        while($place->hasNextPage()){

            //take a nap so google won't block our request based on rates
            sleep(4);

            $results[] = $place->getNextPage()->toArray();
        }

        foreach($results as $result)
        {
            foreach($result as $r){
                $places[] = $r;
            }
        }

        return $places;
    }
}
