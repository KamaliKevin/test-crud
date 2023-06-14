<?php

class Home
{
    // Parents:
    use Controller;

    // Methods:
    public function index()
    {

        $user = new User();
        $data = [];

        /* Welcome message for user */
        $data["username"] = "Greetings, guest";
        if(!empty($_SESSION["USER"])){
            $data["username"] = "Greetings, ".$_SESSION["USER"]->username;
        }

        /* Table of user data */
        $usersData = $user->findAll();
        foreach ($usersData as $user)
        {
            unset($user->password); // Remove the password to hide it
            unset($user->phoneNumber); // Remove the phone number to hide it
        }
        $data["usersData"] = $usersData;

        /* Export Excel or PDF data */
        if(isset($_POST["export"]))
        {
            switch ($_POST["export"])
            {
                case "exportToExcel":
                    $usersData = json_decode(json_encode($usersData), true);
                    $fileName = "usersData.xls";
                    header("Content-Type: application/vnd.ms-excel");
                    header("Content-Disposition: attachment; filename=\"$fileName\"");
                    $isPrintHeader = false;
                    if(!empty($usersData))
                    {
                        foreach ($usersData as $user)
                        {
                            if(!$isPrintHeader)
                            {
                                echo implode("\t", array_keys($user))."\n";
                                $isPrintHeader = true;
                            }

                            echo implode("\t", array_values($user))."\n";
                        }
                    }
                    exit;

                case "exportToPDF":
                    $pdf = new TCPDF("P", "mm", "A4", true, "UTF-8");

                    $pdf->setCreator("Test CRUD");
                    $pdf->setAuthor("Kevin Bruno Geisenhof Sáez");
                    $pdf->setTitle("Users Data");

                    // Add a page
                    $pdf->AddPage();

                    // Set font style
                    $pdf->SetFont("helvetica", "B", 9);

                    // Set fill color for table header
                    $pdf->SetFillColor(100, 100, 100);

                    // Set text color for table header
                    $pdf->SetTextColor(255, 255, 255);

                    // Set draw color for table borders
                    $pdf->SetDrawColor(0, 0, 0);

                    // Set line width for table borders
                    $pdf->SetLineWidth(0.3);


                    // Output table header
                    $pdf->Cell(7, 7, "ID", 1, 0, "L", 1);
                    $pdf->Cell(30, 7, "Username", 1, 0, "L", 1);
                    $pdf->Cell(27, 7, "First Name", 1, 0, "L", 1);
                    $pdf->Cell(27, 7, "Last Name", 1, 0, "L", 1);
                    $pdf->Cell(21, 7, "Date of Birth", 1, 0, "L", 1);
                    $pdf->Cell(53, 7, "Email", 1, 1, "L", 1);

                    // Reset fill color and text color for table body
                    $pdf->SetFillColor(255, 255, 255);
                    $pdf->SetTextColor(0, 0, 0);

                    // Output table data
                    foreach ($usersData as $user) {
                        $pdf->Cell(7, 7, $user->id, 1, 0, "L", 0);
                        $pdf->Cell(30, 7, $user->username, 1, 0, "L", 0);
                        $pdf->Cell(27, 7, $user->firstName, 1, 0, "L", 0);
                        $pdf->Cell(27, 7, $user->lastName, 1, 0, "L", 0);
                        $pdf->Cell(21, 7, $user->dateOfBirth, 1, 0, "L", 0);
                        $pdf->Cell(53, 7, $user->email, 1, 1, "L", 0);
                    }


                    $pdf->Output("usersData.pdf", "D");
                    break;
            }
        }



        $this->view("home", $data); // We go to the main page if no edit was asked for
    }
}