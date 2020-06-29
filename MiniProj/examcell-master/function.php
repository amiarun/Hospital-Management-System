<?php
    function allocatenow()
    {
    include("dbconnect.php");
    //HALL ARRAY
    $hall_query="select * from examhall";
    $result_hall=$conn->query($hall_query);
    $hall_count= (int)$result_hall->num_rows;
    //echo $hall_count;
    $hall=array();
    $total_rows = $result_hall->num_rows;
    while($hall_fetched=$result_hall->fetch_assoc())
    {
        $hall[]=$hall_fetched;
    }
    //END OF HALL ARRAY
    //EXAM ARRAY
    $edate="2019-11-20";
    $sess="FN";
    $tt_query="select * from timetable where exam_date='$edate' and session='$sess'";
    $result_tt=$conn->query($tt_query);
    $tt_count= (int)$result_tt->num_rows;
    //echo $tt_count;
    $tt=array();
    while($tt_fetched=$result_tt->fetch_assoc())
    {
        $tt[]=$tt_fetched;
    }
    //END OF EXAM ARRAY
        //$aloc=array();
        
        $start;
        $end;
        $benches = array();

        //e be exam counter
        //h be hall counter
        for($e=0; $e < $tt_count; $e++)
        {   
            $no_of_students = $tt[$e]['num'];
            $students_allocated = 0;
            for($h=0; $h < $hall_count; $h++)
            {
                if(!array_key_exists($h, $benches)) {
                    $benches[$h] = $hall[$h]['no_of_benches'];
                }

                $benchesLeft=$hall[$h]['no_of_benches'];
                $studentsLeft = $no_of_students - $students_allocated;
                
                if($studentsLeft == 0) {
                    break;
                }
                if($benchesLeft == 0) {
                    continue;
                }

                $start = $students_allocated + 1;

                if(($benchesLeft)>(floor(0.65*$benches[$h])))
                {
                    $maxSeat = floor($benchesLeft/2);
                }
                else {
                    $maxSeat = $benchesLeft;
                }

                if ($studentsLeft <= $maxSeat) 
                {
                    $students_allocated += $studentsLeft;
                }
                else
                {
                    $students_allocated += $maxSeat;
                }
                $hall[$h]['no_of_benches'] -= ($students_allocated - ($no_of_students - $studentsLeft));
                $studentsLeft = $no_of_students - $students_allocated;
                $end = $students_allocated;
                
                //INSERT VARIABLES
                $dept_name=$tt[$e]['dept_name'];
                $sess=$tt[$e]['session'];
                $subcode=$tt[$e]['subject_code'];
                $subname=$tt[$e]['subject_name'];
                $hallid=$hall[$h]['hall_id'];
                $roomno=$hall[$h]['room_no'];
                // $table_insert="insert into '$tablename'(exam_name,exam_date,session,department,semester,subject_name,hall_id,room_no,start_no,end_no) values '$ename','$edate','$sess','$dept_name','$sess','$subcode','$subname','$hallid','$roomno','$start','$end'";
                // $result_table_insert=$conn->query($table_insert);
                echo$tt[$e]['subject_name'],"<br>";
                echo$hall[$h]['room_no'],"<br>";
                echo$start,"<br>";
                echo$end,"<br><br>";

            }
        }
    }
    //echo $tt[1]['num'];
    allocatenow();
    
    //print_r($hall);
    // foreach($hall as $halls )
    // {
        // echo $halls['hall_id'],"\t";
        // echo $halls['room_no'],"\t";
        // echo $halls['no_of_benches'],"<br>";
        // }
        ?>