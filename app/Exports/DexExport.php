<?php

namespace App\Exports;

use App\Models\DEX\DEX;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DexExport implements FromCollection, WithHeadings
{
    use Exportable;
    protected $informeDex;

    public function __construct($informeDex = null)
    {
        $this->informeDex = $informeDex;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->informeDex ?: DEX::all();
    }

    public function headings(): array
    {

        return $this->informeDex->first()->keys()->all();
    }
}
