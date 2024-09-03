<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    
public function exportAllUserDetailsToExcel()
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/User/User/GetAllUser');

        if ($response->successful()) {
            $users = $response->json();

            // Create a new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set the header row
            $sheet->setCellValue('A1', 'UserName');
            $sheet->setCellValue('B1', 'FirstName');
            $sheet->setCellValue('C1', 'LastName');
            $sheet->setCellValue('D1', 'Email');
            $sheet->setCellValue('E1', 'PhoneNumber');
            $sheet->setCellValue('F1', 'userRoles');
            // Add more headers as needed

            // Populate the data
            $rowNumber = 2;
            foreach ($users as $item) {
                $sheet->setCellValue('A' . $rowNumber, $item['username'] ?? '');
                $sheet->setCellValue('B' . $rowNumber, $item['firstName'] ?? '');
                $sheet->setCellValue('C' . $rowNumber, $item['lastName'] ?? '');
                $sheet->setCellValue('D' . $rowNumber, $item['email'] ?? '');
                $sheet->setCellValue('E' . $rowNumber, $item['phoneNumbe'] ?? '');
                $sheet->setCellValue('F' . $rowNumber, $item['userRoles'] ?? '');
                // Add more columns as needed

                $rowNumber++;
            }

            // Write the spreadsheet to a file
            $writer = new Xlsx($spreadsheet);
            $fileName = 'Allusers_details.xlsx';
            $filePath = storage_path('app/public/' . $fileName);
            $writer->save($filePath);

            return response()->download($filePath)->deleteFileAfterSend(true);
        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    }
}
}
