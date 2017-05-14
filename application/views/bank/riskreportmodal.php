<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<style media="screen">
  legend{text-align:center; font-size: 38px;}
  .panel-body{font-size: 13px; }
  .panel-heading{font-size: 14px;}
  #print{float: right; font-size: 14px; }
</style>
<div class="container-fluid" id='printablecontent'>
<legend>Credit Risk Report
<input type="button" onclick="printDiv('printablecontent')" value="Printreport" id='print' class="btn btn-primary">
</legend>
<p>
  <!-- <?php print_r($page_data['resp']); ?> -->
 </p>
 <div class="row">

        <div class="col-lg-6 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Applicant's Profile</h4>
                </div>
                <div class="panel-body">
                    <!-- <div id="performance3" style="height: 270px;"></div> -->
                    <p><b>Name:</b> <?php print_r($page_data['resp']->applicantName)?> </p> 
                    <p><b>Gender:</b> <?php print_r($page_data['resp']->gender)?> </p> 
                    <p><b>Account Holder:</b> <?php if ($page_data['resp']->accountHolder == 'accountholder'){
                        echo 'Yes'; }else{echo 'No';} ?> </p> 
                    <p><b>Unserviced Loans:</b> <?php print_r($page_data['resp']->unservicedLoans)?></p> 
                    <p><b>Loan Amount Requested:</b> UGX <?php print_r($page_data['resp']->loanSizeRequested)?>  </p> 

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Agricultural Profile</h4>
                </div>
                <div class="panel-body">
                    <!-- <div id="performance3" style="height: 270px;"></div> -->
                    <p><b>Farm size:</b> <?php print_r($page_data['resp']->farmSize)?> acres </p> 
                    <p><b>Number of Workers on farm:</b> <?php print_r($page_data['resp']->numberOfWorkers)?> worker(s)</p> 
                    <p><b>Category of Crops grown:</b> <?php print_r($page_data['resp']->categoryOfCropsGrown)?>  </p> 
                    <p><b>Category of Livestock:</b> <?php print_r($page_data['resp']->categoryOfLivestock)?></p> 
                    <p><b>Agricultural training:</b> <?php if($page_data['resp']->agriculturalTraining == False){
                        echo 'None';}else{echo 'Yes';} ?> </p> 
                    <p><b>Years experience in Agriculture:</b> <?php print_r($page_data['resp']->yearsExperienceInAgriculture)?> year(s)</p>
                    <p><b>Proximity to Market:</b><?php print_r($page_data['resp']->proximityToMarket)?>  </p>
                    <p><b>Use of Agricultural incentives:</b> <?php if($page_data['resp']->useOfAgriculturalIncentives == 'False'){echo 'None';}else{ echo 'Yes';} ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #255; color: #fff;">
                    <h4>Credit Score</h4>
                </div>
                <div class="panel-body">
                    <h3>
                       <?php print_r($page_data['resp']->scoreProbability) ?> 
                    </h3>
                    <p>
                        <?php if($page_data['resp']->scoreLabel == 2){
                            echo "Highly risky";
                            }else{
                                echo "low risk";
                                } ?>
                    </p>
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                          ['risk', 'probability'],
                          ['Predicted risk',  <?php print_r($page_data['resp']->scoreProbability)?>],
                          ['',  <?php print_r(1-$page_data['resp']->scoreProbability) ?>],
                          
                        ]);

                        var options = {
                          title: 'Predicted Risk'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                      }
                    </script>
                    <div id="piechart"></div>
                </div>
            </div>

            <a href='<?php echo base_url();?>/index.php/bank/application'><input type="button" class="btn btn-lg" name="finish" value="Finish" ></a>
        </div>
    </div>

</div>

<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
