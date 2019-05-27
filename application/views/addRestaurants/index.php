<div class="container-fluid">
    <div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-2" role="tab" data-toggle="tab">View </a></li>
            <center><li class="text-center" style="margin-top: 10px;"><a><strong>User Menu List</strong></a></li></center>
        </ul>
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="tab-2">
                <fieldset class="scheduler-border"> 
                    <br>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label class="control-label col-md-2 col-xs-2">Limit:</label>
                            <div class="col-md-3 col-xs-10">
                                <input type="text" id="limitedrowshow" class="form-control" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-1 col-xs-2">
                            <span id="countrow" class="pull-right hidden"></span>
                        </div>
                        <div class="col-md-4 col-xs-10">
                            <div class="input-group">
                                <input type="text" class="search form-control" id="mytablesearch" placeholder="Search">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-search"></span>
                                </span>


                            </div>
                        </div>
                        <div class="col-md-2">   
                            <div class="btn-group" role="group">
                                <button class="btn btn-default  btn btn-primary" type="button" onClick="location.href = '/AddRestaurants/excel'">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </button>      
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="table-responsive">
                        <div id="table-wrapper">
                            <div id="table-scroll">
                                <table class="table table-bordered table-hover table-condensed" id="adminAddSliderTable">
                                    <thead>
                                        <tr class="bg-primary">    
                                            <th class="hidden">Id</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>User Name</th>
                                            <th>User Mobile No</th>
                                            <th>User Area</th>
                                            <th>User City</th>
                                            <th>Restaurant Name</th>
                                            <th>Type</th>
                                            <th>Phone Number1</th>
                                            <th>Phone Number2</th>
                                            <th>Address</th>
                                            <th>Area</th>
                                            <th>Suburb</th>
                                            <th>City</th>
                                            <th>PinCode</th>
                                            <th>State</th>
                                            <th>Restaurant Image 1 <span style="color:#337AB7">dlskajflkdsjflkjsldak</span></th>
                                            <th>Restaurant Image 2 <span style="color:#337AB7">dlskajflkdsjflkjsldak</span></th>
                                            <th>Restaurant Image 3 <span style="color:#337AB7">dlskajflkdsjflkjsldak</span></th>
                                            <th>Restaurant Image 4 <span style="color:#337AB7">dlskajflkdsjflkjsldak</span></th>
                                            <th>Restaurant Image 5 <span style="color:#337AB7">dlskajflkdsjflkjsldak</span></th>
                                            <th>Restaurant Image 6 <span style="color:#337AB7">dlskajflkdsjflkjsldak</span></th>
                                            <th>Restaurant Image 7 <span style="color:#337AB7">dlskajflkdsjflkjsldak</span></th>
                                            <th>Restaurant Image 8 <span style="color:#337AB7">dlskajflkdsjflkjsldak</span></th>
                                            <th>Restaurant Image 9 <span style="color:#337AB7">dlskajflkdsjflkjsldak</span></th>
                                            <th>Restaurant Image 10 <span style="color:#337AB7">dlskajflkdsjflkjsldak</span></th>
                                            <th>Opration</th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php foreach ($getUserMenuData as $row): ?>
                                            <tr>
                                                <td class="hidden"><?php echo $row['id']; ?></td>
                                                <td data-field="date" ><?php echo $row['date']; ?></td>  
                                                <td data-field="time"><?php echo $row['time']; ?></td>
                                                <td><?php echo $row['userName']; ?></td>
                                                <td><?php echo $row['userMobileNo']; ?></td>
                                                <td><?php echo $row['userArea']; ?></td>
                                                <td><?php echo $row['userCity']; ?></td>
                                                <td data-field="restName"><?php echo $row['restName']; ?></td>
                                                <td data-field="type" ><?php echo $row['type']; ?></td>  
                                                <td data-field="phoneNo1"><?php echo $row['phoneNo1']; ?></td>
                                                <td data-field="phoneNo2"><?php echo $row['phoneNo2']; ?></td>
                                                <td data-field="address" ><?php echo $row['address']; ?></td>  
                                                <td data-field="area"><?php echo $row['area']; ?></td>
                                                <td data-field="suburb"><?php echo $row['suburb']; ?></td>
                                                <td data-field="city" ><?php echo $row['city']; ?></td>  
                                                <td data-field="pincode"><?php echo $row['pincode']; ?></td>
                                                <td data-field="state"><?php echo $row['state']; ?></td>
                                                <td>
                                                    <?php echo '<img src="' . $row['imagePath1'] . '"  class="img-responsive img-thumbnail col-md-12" style="height:80px;"/>'; ?>
                                                </td>
                                                <td>
                                                    <?php echo '<img src="' . $row['imagePath2'] . '"  class="img-responsive img-thumbnail col-md-12"  style="height:80px;"/>'; ?>
                                                </td>
                                                <td>
                                                    <?php echo '<img src="' . $row['imagePath3'] . '"  class="img-responsive img-thumbnail col-md-12"  style="height:80px;"/>'; ?>
                                                </td>
                                                <td>
                                                    <?php echo '<img src="' . $row['imagePath4'] . '"  class="img-responsive img-thumbnail col-md-12"  style="height:80px;"/>'; ?>
                                                </td>       
                                                <td>    
                                                    <?php echo '<img src="' . $row['imagePath5'] . '"  class="img-responsive img-thumbnail col-md-12"  style="height:80px;"/>'; ?>
                                                </td>  
                                                <td>
                                                    <?php echo '<img src="' . $row['imagePath6'] . '"  class="img-responsive img-thumbnail col-md-12"  style="height:80px;"/>'; ?>
                                                </td>
                                                <td>
                                                    <?php echo '<img src="' . $row['imagePath7'] . '"  class="img-responsive img-thumbnail col-md-12"  style="height:80px;"/>'; ?>
                                                </td>
                                                <td>
                                                    <?php echo '<img src="' . $row['imagePath8'] . '"  class="img-responsive img-thumbnail col-md-12"  style="height:80px;"/>'; ?>
                                                </td>
                                                <td>
                                                    <?php echo '<img src="' . $row['imagePath9'] . '"  class="img-responsive img-thumbnail col-md-12"  style="height:80px;"/>'; ?>
                                                </td>
                                                <td>
                                                    <?php echo '<img src="' . $row['imagePath10'] . '"  class="img-responsive img-thumbnail col-md-12"  style="height:80px;"/>'; ?>
                                                </td>

                                                <td><i class="fa fa-pencil btn-mg edit btn btn-primary btn-md"></i>
                                                    <i class="fa fa-save btn-md btn btn-primary btn-md save hidden" ></i>
                                                    <i class="fa fa-trash-o btn-md btn btn-warning btn-md btnDeleteAsk" aria-hidden="true"></i>
                                                    <i class="fa fa-check btn btn-warning btn-md btndeleteConfirm hidden" aria-hidden="true">Confirm</i>
                                                </td>
                                            </tr>   
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>     
                        </div>
                    </div> 
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#fileaddSliderOption").change(function () {
                                setTimeout(function () {
                                    $('#saveAddSliderSubmitBtn').click();
                                }, 400);

                            });
                        });
                    </script>
                    <script type="text/javascript">

                        $(document).ready(function () {

                            $("#adminAddSliderTable").each(function () {
                                $('th:nth-child(1), thead td:nth-child(1)', this).each(function () {
                                    var tag = $(this).prop('tagName');
                                    $(this).before('<' + tag + '>Sr No</' + tag + '>');
                                });
                                $('td:nth-child(1)', this).each(function (i) {
                                    $(this).before('<td>' + (i + 1) + '</td>');
                                });
                            });
                        });
                    </script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            var rowCount = $('#adminAddSliderTable tr').length;
                            $('#countrow').text(rowCount);
                            $('#mytablesearch').keyup(function () {
                                searchTable($(this).val());
                                var numOfVisibleRows = $('tr:visible').length - 1;
                                $('#countrow').text(numOfVisibleRows);
                            });
                            $('#limitedrowshow').keyup(function () {
                                var limiterow = $(this).val();
                                if (limiterow == "") {
                                    $('#adminAddSliderTable  > tbody > tr').show();
                                } else {
                                    $('#adminAddSliderTable  > tbody > tr').slice(limiterow).hide();
                                }

                            });
                        });
                        function searchTable(inputVal) {
                            var table = $('#adminAddSliderTable');
                            table.find('tr').each(function (index, row) {
                                var allCells = $(row).find('td');
                                if (allCells.length) {
                                    var found = false;
                                    allCells.each(function (index, td) {
                                        var regExp = new RegExp(inputVal, 'i');
                                        if (regExp.test($(td).text())) {
                                            found = true;
                                            return false;
                                        }
                                    });
                                    if (found == true)
                                        $(row).show();
                                    else
                                        $(row).hide();
                                }

                            });
                        }
                    </script>
                    <script type="text/javascript">
                        $(function () {
                            //$('.save').hide();
                            $('table tr').editable({
                                edit: function (values) {
                                    var row_index = $(this).closest("tr").index();
                                    $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".edit").addClass("hidden");
                                    $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".save").removeClass('hidden');
                                    //    $('.edit').hide();
                                    //   $('.save').show();
                                }
                            });
                        });
                    </script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.fa-save').click(function () {
                                $(".fa-save").dblclick();
                                var id = $(this).closest('tr').children('td:eq(1)').text();
                                var date = $(this).closest('tr').children('td:eq(2)').text();
                                var time = $(this).closest('tr').children('td:eq(3)').text();
                                var restName = $(this).closest('tr').children('td:eq(8)').text();
                                var type = $(this).closest('tr').children('td:eq(9)').text();
                                var phoneNo1 = $(this).closest('tr').children('td:eq(10)').text();
                                var phoneNo2 = $(this).closest('tr').children('td:eq(11)').text();
                                var address = $(this).closest('tr').children('td:eq(12)').text();
                                var area = $(this).closest('tr').children('td:eq(13)').text();
                                var suburb = $(this).closest('tr').children('td:eq(14)').text();
                                var city = $(this).closest('tr').children('td:eq(15)').text();
                                var pincode = $(this).closest('tr').children('td:eq(16)').text();
                                var state = $(this).closest('tr').children('td:eq(17)').text();
                                $.ajax({
                                    type: 'POST',
                                    url: 'AddRestaurants/updateWeb',
                                    data: {'id': id, 'date': date, 'time': time, 'restName': restName, 'type': type, 'phoneNo1': phoneNo1, 'phoneNo2': phoneNo2, 'address': address, 'area': area, 'suburb': suburb, 'city': city, 'pincode': pincode, 'state': state},
                                    success: function (data) {
                                        $('.content').load("AddRestaurants");
                                        $('.error1').text('Updata Data.');
                                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                        setTimeout(function () {
                                            $('#tabView').click();
                                        }, 400);
                                    }
                                });
                            });
                            $('.btnDeleteAsk').click(function () {
                                var row_index = $(this).closest("tr").index();
                                $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".btnDeleteAsk").addClass("hidden");
                                $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".btndeleteConfirm").removeClass('hidden');
                                //   $('.btnDeleteAsk').hide();
                                //   $('.btndeleteConfirm').removeClass('hidden');

                            });
                            $('.btndeleteConfirm').click(function () {
                                var id = $(this).closest('tr').children('td:eq(1)').text();
                                $.ajax({
                                    type: 'POST',
                                    url: 'AddRestaurants/deleteWeb',
                                    data: {'id': id},
                                    success: function (data) {
                                        $('.content').load("AddRestaurants");
                                        $('.error1').text('Delete Data.');
                                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                                        setTimeout(function () {
                                            $('#tabView').click();
                                        }, 400);
                                    }
                                });
                            });
                        });
                    </script>
                </fieldset>
            </div>
        </div>
    </div>
</div>
