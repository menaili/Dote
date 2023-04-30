<?php

namespace App\Http\Controllers;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Curriculum;
use App\Models\Phone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TestResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class DoController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Use the `with` method to eager load the `profile` relationship
            $profile = User::with('phone.adress','link.application.category','curriculum')
            ->where('id', $request->id)
            ->get();

            if ($profile->isEmpty()) {
                return'Profile data not found for user';
                throw new \Exception('Profile data not found for user');
            }
            else{
                return $this->success(TestResource::collection($profile));
            }
            
       
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }


    public function test(Request $request)
    {
        return response()->json([
            'stuff' => phpinfo()
           ]);
    }

    public function CvProfile()
    {

        try {

        $user = Auth::user()->id;

        $cv = Curriculum::where('user_id', $user)
        ->get();
        if ($cv->isEmpty()) {
            return $this->errorCV($cv);
            throw new \Exception('CV data not found ');
        }
        return $this->success($cv);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
       

    }

    public function CvProallfile()
    {

        //$results = DB::select('SHOW TABLES');

        $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $table) {
            $results = DB::table($table)->get();
            // Do something with $results
        }
       
            return $tables;
        }
       

        public function allD()
        {
            $tables = DB::select('SHOW TABLES');
            $data = array();
            foreach ($tables as $table) {
                $table = $table->{'Tables_in_' . env('DB_DATABASE')};
                $rows = DB::table($table)->get()->toArray();
                $data[$table] = $rows;
            }
            return $data;
        
        }
        
        public function downloadCSV() {
            $data = User::all();
        
            // Create a stream for the CSV file
            $stream = fopen('php://temp', 'w+');
        
            // Write the column headers to the CSV file
            fputcsv($stream, array('Column 1', 'Column 2', 'Column 3'));
        
            // Write the data rows to the CSV file
            foreach ($data as $row) {
                fputcsv($stream, array($row->name, $row->email, $row->password));
            }
        
            // Reset the file pointer to the beginning of the stream
            rewind($stream);
        
            // Set the response headers for CSV download
            $headers = array(
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="data.csv"',
            );
        
            // Return the CSV file as a download response
            return response(stream_get_contents($stream), 200, $headers)->send();
        }
        
// $data now contains all data from all tables in the database
public function all()
{
    $tables = DB::select('SHOW TABLES');
    $data = array();
    foreach ($tables as $table) {
        $table = $table->{'Tables_in_' . env('DB_DATABASE')};
        $rows = DB::table($table)->get()->toArray();
        $data[$table] = $rows;
    }
    return response()->json($data);
}

public function allData()
{
    return $this->all();
}

// define a route for the allData method

}
