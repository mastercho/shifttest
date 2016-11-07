<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>    <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles / Bootstrap  -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>    

    </head>
    <body data-gr-c-s-loaded="true">

        <div id="calendar" class="fc fc-unthemed fc-ltr">

            <div id="01" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">                                                                                                 
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>    
                                    <th>User</th>

                                    <th>Monday</th>    

                                    <th>Tuesday</th>    

                                    <th>Wednesday</th>    

                                    <th>Thursday</th>    

                                    <th>Friday</th>    

                                    <th>Saturday</th>    

                                    <th>Sunday</th>    
                                </tr>
                            </thead>
                            <tbody>                                                                                                                                                        
                                <tr>
                                    @foreach($table as $data)

                                    <td>{{ $data['staffid'] }}</td> 
                                    <td>{{ $data['day0'] }}</td> 
                                    <!--<td>{{ gmdate('H:i:s', floor($data['day0'] * 3600))  }} Hours</td>-->  
                                    <!--  Here we can make  to display correct time from decimal like 8.92 to 8 hours and 55.2 minutes-->
                                    <td>{{ $data['day1'] }} Hours</td> 
                                    <td>{{ $data['day2'] }} Hours</td> 
                                    <td>{{ $data['day3'] }} Hours</td> 
                                    <td>{{ $data['day4'] }} Hours</td> 
                                    <td>{{ $data['day5'] }} Hours</td> 
                                    <td>{{ $data['day6'] }} Hours</td> 
                                </tr>
                                @endforeach



                            </tbody></table><table>
                            <tbody><tr>
                                    <td colspan="2" class="text-right">
                                        <strong style="margin-right: 10px; ">Total Hour Work This Week:  </strong>
                                    </td>

                                    <td>
                                        <?php echo $table[10]['day0'] + $table[10]['day1'] + $table[10]['day2'] + $table[10]['day3'] + $table[10]['day4'] + $table[10]['day5'] + $table[10]['day6'] ?> Hours
                                        <!--  Here we can also SUM in MySql Query and pass to View(here) which is the best way i think and yea i know echo is really bad -->

                                    </td>
                                </tr>
                            </tbody></table>



                    </div>                                                                                                                               

                </div>                                    
            </div>
        </div>


    </body>
</html>
