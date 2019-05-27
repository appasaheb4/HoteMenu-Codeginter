
<div class="container-fluid">   
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1" role="tab" id="tab1id" data-toggle="tab">Add </a></li>
        <li><a href="#tab-2" role="tab" id="tabView" data-toggle="tab">View </a></li>
        <center><li class="text-center" style="margin-top: 10px;"><a><strong>Admin Add Menu List</strong></a></li></center>
    </ul>
    <div class="tab-content">    
        <div role="tabpanel" class="tab-pane active" id="tab-1">
            <fieldset class="scheduler-border">     
                <br>   
                <form method="post" action="AddMenu/insertWeb" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-md-1">Date:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control txtDate" name="txtDate" value="<?php echo $date = date('Y-m-d'); ?>" />
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('.txtDate').datepicker({
                                    changeMonth: true,
                                    changeYear: true,
                                    yearRange: "-25:+5",
                                    dateFormat: 'yy-mm-dd'
                                });

                            });
                        </script>    

                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">

                        <label class="control-label col-md-1">Restaurant Name:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Restaurant Name" name="txtRestName" />
                        </div>

                        <div class="form-inline">
                            <div class="checkbox col-md-2">
                                <label class="control-label">
                                    <input type="checkbox" class="typech" name="type1" value="Veg" />  Veg</label>
                            </div>
                            <div class="checkbox col-md-2">
                                <label class="control-label">
                                    <input type="checkbox" class="typech" name="type1" value="Non-Veg" />  Non Veg</label>
                                <input type="hidden" id="typeselted" name="type"/>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $(".typech").change(function () {
                                        var favorite = [];
                                        $.each($("input[name='type1']:checked"), function () {
                                            favorite.push($(this).val());
                                        });
                                        $('#typeselted').val(favorite.join(","));
                                    });
                                });
                            </script>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1">Phone No 1:</label>
                        <div class="col-md-5">  
                            <input type="number" class="form-control" placeholder="Phone Number 1" name="txtPhone1" required="" />
                        </div>
                        <label class="control-label col-md-1">Phone No 2:</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" placeholder="Phone Number 2" name="txtPhone2" />
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1">Address: </label>
                        <div class="col-md-5">
                            <textarea class="form-control" placeholder="Address" name="txtAddress"></textarea>
                        </div>
                        <label class="control-label col-md-1">Area: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Area" name="txtArea" required="" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">

                        <label class="control-label col-md-1">Suburb: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Suburb" name="txtSubrb" />
                        </div>
                        <label class="control-label col-md-1">City: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="City" name="txtCity" required="" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1">Pin: </label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" placeholder="PinCode" name="txtPinCode" />
                        </div>
                        <label class="control-label col-md-1">State: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="State" name="txtState" />
                        </div>
                        <div class="clearfix"></div>
                    </div>     

                    <div class="form-group">
                        <label class="control-label col-md-12 text-center">Images: </label>
                        <div class="clearfix"></div>
                    </div>   

                    <div class="form-group col-md-offset-1">
                        <div class="col-md-2">
                            <input type="file" name="fimagefile" id="fimagefile" onchange="readURLI(this);" class="form-control">
                            <img src="" alt="I Image" name="fimage" id="fimage"  style="filter:FlipH; filter: FlipV;" class="img-bordered img-responsive img-thumbnail">
                            <br/><span id="upload1" style="color: green;">Upload image done.</span>
                        </div>
                        <div class="col-md-2">
                            <input type="file" name="simagefile" id="simagefile" onchange="readURLII(this);" class="form-control">
                            <img src="" alt="II Image" name="simage" id="simage" class="img-bordered img-responsive img-thumbnail">
                            <br/><span id="upload2" style="color: green;">Upload image done.</span>
                        </div>
                        <div class="col-md-2">
                            <input type="file" name="timagefile" id="timagefile" onchange="readURLIII(this);" class="form-control">
                            <img src="" alt="III Image" name="timage" id="timage" class="img-bordered img-responsive img-thumbnail">
                            <br/><span id="upload3" style="color: green;">Upload image done.</span>
                        </div>
                        <div class="col-md-2">
                            <input type="file" name="fourimagefile" id="fourimagefile" onchange="readURLIV(this);" class="form-control">
                            <img src="" alt="IV Image" name="fourimage" id="fourimage" class="img-bordered img-responsive img-thumbnail">
                            <br/><span id="upload4" style="color: green;">Upload image done.</span>
                        </div>  
                        <div class="col-md-2">
                            <input type="file" name="fiveimagefile" id="fiveimagefile" onchange="readURLV(this);" class="form-control">
                            <img src="" alt="V Image" name="fiveimage" id="fiveimage" class="img-bordered img-responsive img-thumbnail">
                            <br/><span id="upload5" style="color: green;">Upload image done.</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col-md-offset-1">
                        <div class="col-md-2">
                            <input type="file" name="sixImagefile" id="sixImagefile" onchange="readURLVI(this);" class="form-control">
                            <img src="" alt="VI Image" name="sixImage" id="sixImage" class="img-bordered img-responsive img-thumbnail">
                            <br/><span id="upload6" style="color: green;">Upload image done.</span>
                        </div>
                        <div class="col-md-2">   
                            <input type="file" name="sevenimagefile" id="sevenimagefile" onchange="readURLVII(this);" class="form-control">
                            <img src="" alt="VII Image" name="sevenimage" id="sevenimage" class="img-bordered img-responsive img-thumbnail">
                            <br/><span id="upload7" style="color: green;">Upload image done.</span>
                        </div>
                        <div class="col-md-2">
                            <input type="file" name="eigthimagefile" id="eigthimagefile" onchange="readURLVIII(this);" class="form-control">
                            <img src="" alt="VIII Image" name="eigthimage" id="eigthimage" class="img-bordered img-responsive img-thumbnail">
                            <br/><span id="upload8" style="color: green;">Upload image done.</span>
                        </div>
                        <div class="col-md-2">
                            <input type="file" name="nighenimagefile" id="nighenimagefile" onchange="readURLIX(this);" class="form-control">
                            <img src="" alt="IX Image" name="nighenimage" id="nighenimage" class="img-bordered img-responsive img-thumbnail">
                            <br/><span id="upload9" style="color: green;">Upload image done.</span>
                        </div>
                        <div class="col-md-2">     
                            <input type="file" name="tenimagefile" id="tenimagefile" onchange="readURLX(this);" class="form-control">
                            <img src="" alt="X Image" name="tenimage" id="tenimage" class="img-bordered img-responsive img-thumbnail">
                            <br/><span id="upload10" style="color: green;">Upload image done.</span>
                        </div>     
                        <div class="clearfix"></div>    
                    </div>
                    <script type="text/javascript">
                        function readURLI(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#fimage').attr('src', e.target.result);
                                   
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                            $('#upload1').click();
                        }
                        function readURLII(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#simage').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                            $('#upload2').click();
                        }
                        function readURLIII(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#timage').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                            $('#upload3').click();
                        }
                        function readURLIV(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#fourimage').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                            $('#upload4').click();
                        }
                        function readURLV(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#fiveimage').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                            $('#upload5').click();
                        }
                        function readURLVI(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#sixImage').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                            $('#upload6').click();
                        }
                        function readURLVII(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#sevenimage').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                            $('#upload7').click();
                        }
                        function readURLVIII(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#eigthimage').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                            $('#upload8').click();
                        }
                        function readURLIX(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#nighenimage').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                            $('#upload9').click();
                        }
                        function readURLX(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#tenimage').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                            $('#upload10').click();
                        }

                        function removeAllIcon() {
                            $('#tenimage').attr('src', '');
                            $('#fimage').attr('src', '');
                            $('#simage').attr('src', '');
                            $('#timage').attr('src', '');
                            $('#fourimage').attr('src', '');
                            $('#fiveimage').attr('src', '');
                            $('#sixImage').attr('src', '');
                            $('#sevenimage').attr('src', '');
                            $('#eigthimage').attr('src', '');
                            $('#nighenimage').attr('src', '');
                        }
                    </script>


                    <script type="text/javascript">
                        $(document).ready(function (e) {
                            $('#upload1').hide();
                            $('#upload2').hide();
                            $('#upload3').hide();
                            $('#upload4').hide();
                            $('#upload5').hide();
                            $('#upload6').hide();
                            $('#upload7').hide();
                            $('#upload8').hide();
                            $('#upload9').hide();
                            $('#upload10').hide();
                            $('#upload1').on('click', function () {
                                var file_data = $('#fimagefile').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: 'AddMenu/upload_file', // point to server-side controller method
                                    dataType: 'text', // what to expect back from the server
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (response) {
                                        $('#upload1').text('File successfully uploaded.');
                                        $('#upload1').show();
                                    },
                                    error: function (response) {
                                        $('#upload1').html(response);
                                        $('#upload1').show();

                                    }
                                });
                            });
                            $('#upload2').on('click', function () {
                                var file_data = $('#simagefile').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: 'AddMenu/upload_file', // point to server-side controller method
                                    dataType: 'text', // what to expect back from the server
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (response) {
                                        $('#upload2').text('File successfully uploaded.');
                                        $('#upload2').show();
                                    },
                                    error: function (response) {
                                        $('#upload2').html(response);
                                        $('#upload2').show();

                                    }
                                });
                            });
                            $('#upload3').on('click', function () {
                                var file_data = $('#timagefile').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: 'AddMenu/upload_file', // point to server-side controller method
                                    dataType: 'text', // what to expect back from the server
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (response) {
                                        $('#upload3').text('File successfully uploaded.');
                                        $('#upload3').show();
                                    },
                                    error: function (response) {
                                        $('#upload3').html(response);
                                        $('#upload3').show();

                                    }
                                });
                            });
                            $('#upload4').on('click', function () {
                                var file_data = $('#fourimagefile').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: 'AddMenu/upload_file', // point to server-side controller method
                                    dataType: 'text', // what to expect back from the server
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (response) {
                                        $('#upload4').text('File successfully uploaded.');
                                        $('#upload4').show();
                                    },
                                    error: function (response) {
                                        $('#upload4').html(response);
                                        $('#upload4').show();

                                    }
                                });
                            });
                            $('#upload5').on('click', function () {
                                var file_data = $('#fiveimagefile').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: 'AddMenu/upload_file', // point to server-side controller method
                                    dataType: 'text', // what to expect back from the server
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (response) {
                                        $('#upload5').text('File successfully uploaded.');
                                        $('#upload5').show();
                                    },
                                    error: function (response) {
                                        $('#upload5').html(response);
                                        $('#upload5').show();

                                    }
                                });
                            });
                            $('#upload6').on('click', function () {
                                var file_data = $('#sixImagefile').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: 'AddMenu/upload_file', // point to server-side controller method
                                    dataType: 'text', // what to expect back from the server
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (response) {
                                        $('#upload6').text('File successfully uploaded.');
                                        $('#upload6').show();
                                    },
                                    error: function (response) {
                                        $('#upload6').html(response);
                                        $('#upload6').show();

                                    }
                                });
                            });
                            $('#upload7').on('click', function () {
                                var file_data = $('#sevenimagefile').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: 'AddMenu/upload_file', // point to server-side controller method
                                    dataType: 'text', // what to expect back from the server
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (response) {
                                        $('#upload7').text('File successfully uploaded.');
                                        $('#upload7').show();
                                    },
                                    error: function (response) {
                                        $('#upload7').html(response);
                                        $('#upload7').show();

                                    }
                                });
                            });
                            $('#upload8').on('click', function () {
                                var file_data = $('#eigthimagefile').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: 'AddMenu/upload_file', // point to server-side controller method
                                    dataType: 'text', // what to expect back from the server
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (response) {
                                        $('#upload8').text('File successfully uploaded.');
                                        $('#upload8').show();
                                    },
                                    error: function (response) {
                                        $('#upload8').html(response);
                                        $('#upload8').show();

                                    }
                                });
                            });
                            $('#upload9').on('click', function () {
                                var file_data = $('#nighenimagefile').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: 'AddMenu/upload_file', // point to server-side controller method
                                    dataType: 'text', // what to expect back from the server
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (response) {
                                        $('#upload9').text('File successfully uploaded.');
                                        $('#upload9').show();
                                    },
                                    error: function (response) {
                                        $('#upload9').html(response);
                                        $('#upload9').show();

                                    }
                                });
                            });
                            $('#upload10').on('click', function () {
                                var file_data = $('#tenimagefile').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: 'AddMenu/upload_file', // point to server-side controller method
                                    dataType: 'text', // what to expect back from the server
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: 'post',
                                    success: function (response) {
                                        $('#upload10').text('File successfully uploaded.');
                                        $('#upload10').show();
                                    },
                                    error: function (response) {
                                        $('#upload10').html(response);
                                        $('#upload10').show();

                                    }
                                });
                            });
                        });
                    </script>


                    <div class="form-group">
                        <div class="col-md-offset-5">
                            <div role="group" class="btn-group">
                                <button class="btn btn-primary" type="submit">Save </button>
                                <button class="btn btn-warning" onclick="removeAllIcon();" type="reset">Clear </button>
                            </div>
                        </div>
                    </div>

                </form>
            </fieldset>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-2">
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
                            <button class="btn btn-default  btn btn-primary" type="button" onClick="location.href = '/AddMenu/excel'">
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
                <div class="table-responsive" >
                    <div id="table-wrapper">
                        <div id="table-scroll">
                            <table class="table table-bordered table-hover table-condensed" id="adminAddSliderTable">
                                <thead>
                                    <tr class="bg-primary">    
                                        <th class="hidden">Id</th>
                                        <th>Date</th>  
                                        <th>Time</th>
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
                                    <?php foreach ($getAddMenuData as $row): ?>
                                        <tr>
                                            <td class="hidden"><?php echo $row['id']; ?></td>
                                            <td data-field="date" ><?php echo $row['date']; ?></td>  
                                            <td data-field="time"><?php echo $row['time']; ?></td>
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
                        // $('.save').hide();
                        $('table tr').editable({
                            edit: function (values) {
                                var row_index = $(this).closest("tr").index();
                                $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".edit").addClass("hidden");
                                $("#adminAddSliderTable tbody tr:eq(" + row_index + ")").find(".save").removeClass('hidden');
                                //$('.edit').hide();
                                //$('.save').show();
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
                            var restName = $(this).closest('tr').children('td:eq(4)').text();
                            var type = $(this).closest('tr').children('td:eq(5)').text();
                            var phoneNo1 = $(this).closest('tr').children('td:eq(6)').text();
                            var phoneNo2 = $(this).closest('tr').children('td:eq(7)').text();
                            var address = $(this).closest('tr').children('td:eq(8)').text();
                            var area = $(this).closest('tr').children('td:eq(9)').text();
                            var subrub = $(this).closest('tr').children('td:eq(10)').text();
                            var city = $(this).closest('tr').children('td:eq(11)').text();
                            var pincode = $(this).closest('tr').children('td:eq(12)').text();
                            var state = $(this).closest('tr').children('td:eq(13)').text();
                            $.ajax({
                                type: 'POST',
                                url: 'AddMenu/updateWeb',
                                data: {'id': id, 'date': date, 'time': time, 'restName': restName, 'type': type, 'phoneNo1': phoneNo1, 'phoneNo2': phoneNo2, 'address': address, 'area': area, 'subrub': subrub, 'city': city, 'pincode': pincode, 'state': state},
                                success: function (data14) {
                                    $('.content').load("AddMenu");
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
                            // $('.btnDeleteAsk').hide();
                            // $('.btndeleteConfirm').removeClass('hidden');

                        });
                        $('.btndeleteConfirm').click(function () {
                            var id = $(this).closest('tr').children('td:eq(1)').text();
                            $.ajax({
                                type: 'POST',
                                url: 'AddMenu/deleteWeb',
                                data: {'id': id},
                                success: function (data) {
                                    $('.content').load("AddMenu");
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



