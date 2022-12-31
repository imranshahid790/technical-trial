<?php
  
namespace App\Imports;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;

use Hash;
use Throwable;

class ImportExcel implements ToCollection,SkipsOnError,SkipsOnFailure,WithChunkReading,ShouldQueue
{
    use Importable, SkipsErrors, SkipsFailures;

    protected $excel;

    public function __construct(Excel $excel){
        $this->excel = $excel;
    }
  
    public function collection(Collection $rows)
    {
           
            foreach ($rows as $row) {
                $this->excel->excel_details()->create([
                    'name' => isset($row[0]) ? $row[0] :null,
                    'roll_number' => isset($row[1]) ? $row[1] :null,
                    'class' => isset($row[2]) ? $row[2] :null,
                    'department' => isset($row[3]) ? $row[3] :null,
                    'title' => isset($row[4]) ? $row[4] :null
                ]);
            }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
 
    public function onError(Throwable $throw)
    {
        
    }
}