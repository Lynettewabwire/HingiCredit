<style>
 .stepwizard-step p{margin-top:10px}.stepwizard-row{display:table-row}.stepwizard{display:table;width:50%;position:relative}.stepwizard-step button[disabled]{opacity:1
   !important;filter:alpha(opacity=100) !important}.stepwizard-row:before{top:14px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}.stepwizard-step
   {display:table-cell;text-align:center;position:relative}.btn-circle{width:30px;height:30px;text-align:center;padding:6px 0;font-size:12px;line-height:1.428571429;border-radius:15px}
   legend{text-align:center}
</style>
<script type="text/javascript">
  $(document).ready(function() {
      var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn'),
          allPrevBtn = $('.prevBtn');

      allWells.hide();

      navListItems.click(function(e) {
          e.preventDefault();
          var $target = $($(this).attr('href')),
              $item = $(this);

          if (!$item.hasClass('disabled')) {
              navListItems.removeClass('btn-primary').addClass('btn-default');
              $item.addClass('btn-primary');
              allWells.hide();
              $target.show();
              $target.find('input:eq(0)').focus();
          }
      });

      allPrevBtn.click(function() {
          var curStep = $(this).closest(".setup-content"),
              curStepBtn = curStep.attr("id"),
              prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

          prevStepWizard.removeAttr('disabled').trigger('click');
      });

      allNextBtn.click(function() {
          var curStep = $(this).closest(".setup-content"),
              curStepBtn = curStep.attr("id"),
              nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
              curInputs = curStep.find("input[type='text'],input[type='url']"),
              isValid = true;

          $(".form-group").removeClass("has-error");
          for (var i = 0; i < curInputs.length; i++) {
              if (!curInputs[i].validity.valid) {
                  isValid = false;
                  $(curInputs[i]).closest(".form-group").addClass("has-error");
              }
          }

          if (isValid)
              nextStepWizard.removeAttr('disabled').trigger('click');
      });

      $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>

<div class="container-fluid">
  <div class="stepwizard col-md-offset-3">
  <div class="stepwizard-row setup-panel">
    <div class="stepwizard-step">
      <a href="#personalprofile" type="button" class="btn btn-primary btn-circle">1</a>
      <p>Personal Profile</p>
    </div>
    <div class="stepwizard-step">
      <a href="#financialprofile" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
      <p>Financial Profile </p>
    </div>
    <div class="stepwizard-step">
      <a href="#agriculturalprofile" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
      <p>Agricultural Profile</p>
    </div>
  </div>
  </div>

  <form class="form-horizontal input-sm" method="post" action='<?php echo base_url();?>index.php/bank/application/submit' required>
  <div class="row setup-content" id="personalprofile">
  <div>
    <legend>Personal Profile</legend>
   <div class="form-group">
    <label class="col-md-4 control-label" for="firstname">First Name</label>
    <div class="col-md-3">
    <input name="firstname" type="text" required="required" placeholder="e.g. Jane" class="form-control input-md">
    </div>
    <label class="col-md-2 control-label" for="lastname">Last Name</label>
    <div class="col-md-3">
    <input name="lastname" type="text" placeholder="e.g. Mugisha" class="form-control input-md">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="age"> Age</label>
    <div class="col-md-2">
    <input name="age" type="text" placeholder="Age in years e.g. 35" class="form-control input-md">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="gender">Gender</label>
    <div class="col-md-4">
      <label class="radio-inline" for="male">
        <input type="radio" name="gender" value="male">
        Male
      </label>
      <label class="radio-inline" for="female">
        <input type="radio" name="gender" value="female">
        Female
      </label>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="marital">Marital Status</label>
    <div class="col-md-2">
      <select name="marital" class="form-control">
        <option value="">Select </option>
        <option value="M1">Single</option>
        <option value="M2">Married</option>
        <option value="M3">Divorced</option>
        <option value="M4">Widowed</option>
      </select>
    </div>
    <label class="col-md-3 control-label" for="household">Household Size</label>
    <div class="col-md-2">
    <input name="household" type="text" placeholder="e.g. 4" class="form-control input-md">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="citizenship">Are you a citizen of Uganda?</label>
    <div class="col-md-4">
      <label class="radio-inline" for="citizen">
        <input type="radio" name="citizenship" id="citizen" value="citizen">
        Yes
      </label>
      <label class="radio-inline" for="noncitizen">
        <input type="radio" name="citizenship" id="noncitizen" value="noncitizen">
        No
      </label>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="education">Level Of Education</label>
    <div class="col-md-3">
      <select id="education" name="education" class="form-control">
        <option value="">Select Highest Level</option>
        <option value="E1">No Education</option>
        <option value="E2">Primary Education</option>
        <option value="E3">Secondary Education</option>
        <option value="E4">Tertiary Education</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="employment">Are you formally employed?</label>
    <div class="col-md-4">
    <div class="radio">
      <label for="employed">
        <input type="radio" name="employment" id="employed" value="employed">
      Yes
      </label>
    </div>
    <div class="radio">
      <label for="notemployed">
        <input type="radio" name="employment" id="notemployed" value="notemployed">
        No
      </label>
    </div>
    </div>
  </div>

  <button type="button" class=" btn btn-primary nextBtn pull-right" >  Next</button>

  </div>
</div>
<div class="row setup-content" id="financialprofile">
  <div>
    <legend>Financial Profile</legend>
      <div class="form-group">
        <label class="col-md-4 control-label" for="accountholder">Do you have an Account with this bank?</label>
        <div class="col-md-4">
          <label class="radio-inline" for="yesaccount">
            <input type="radio" name="accountholder" id="yesaccount" value="accountholder">
            Yes
          </label>
          <label class="radio-inline" for="noacc">
            <input type="radio" name="accountholder" id="noacc" value="non-accountholder">
            No
          </label>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="accountbal">Overall Bank Account balance</label>
        <div class="col-md-3">
        <input id="textinput" name="accountbal" type="text" placeholder="Amount in UGX" class="form-control input-md">
        </div>
      </div>

      <div class="form-group">
      <label class="col-md-4 control-label" for="loanbefore">Have you got a loan before?</label>
        <div class="col-md-4">
        <div class="radio">
          <label for="yesloan">
            <input type="radio" name="loanbefore" id="yesloan" value="yes">
          Yes
          </label>
        </div>
        <div class="radio">
          <label for="noloan">
            <input type="radio" name="loanbefore" id="noloan" value="no">
            No
          </label>
        </div>
        </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="unserviced">Any Unserviced Loans?</label>
      <div class="col-md-4">
        <label class="radio-inline" for="yesaccount">
          <input type="radio" name="unserviced" id="yesun" value="yes">
          Yes
        </label>
        <label class="radio-inline" for="noacc">
          <input type="radio" name="unserviced" id="noun" value="no">
          No
        </label>
      </div>
    </div>


    <div class="form-group">
      <label class="col-md-4 control-label" for="nonagricincome">Monthly Non-agricultural Income</label>
      <div class="col-md-3">
        <select id="nonagricincome" name="nonagricincome" class="form-control">
          <option value="">Select Closest range</option>
          <option value="A0">0 UGX</option>
          <option value="A1">less than 500K UGX</option>
          <option value="A2">500K-1M UGX</option>
          <option value="A3">1M-3M UGX</option>
          <option value="A4">greater than 3M UGX</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="loanamount">Loan Amount being Requested </label>
      <div class="col-md-3">
      <input id="textinput" name="loanamount" type="text" placeholder="Amount in UGX" class="form-control input-md">
      </div>
    </div>
    <button class="btn btn-primary prevBtn pull-left" type="button">Previous</button>
    <button type="button" class="btn btn-primary nextBtn pull-right" > Next</button>

  </div>
</div>
<div class="row setup-content" id="agriculturalprofile">
  <div>
    <legend>Agricultural Profile</legend>
    <div class="form-group">
      <label class="col-md-4 control-label" for="farmsize">Farm size </label>
      <div class="col-md-2">
      <input name="farmsize" type="text" placeholder="Size in Acres" class="form-control input-md">
      </div>
      <label class="col-md-3 control-label" for="farmworkers">Number of Workers on farm</label>
      <div class="col-md-2">
      <input id="farmworkers" name="farmworkers" type="text" placeholder="Number of persons" class="form-control input-md">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="categoryofcrops">Category of Crops grown</label>
      <div class="col-md-2">
        <select id="categoryofcrops" name="categoryofcrops" class="form-control">
          <option value="">Select Category</option>
          <option value="none">None</option>
          <option value="Cash Crops">Cash Crops</option>
          <option value="Perishable food crops">Perishable food crops</option>
          <option value="Non-perishable food crops">Non-perishable food crops</option>
        </select>
      </div>

      <label class="col-md-3 control-label" for="categoryoflivestock">Category of livestock</label>
      <div class="col-md-2">
        <select id="categoryofcrops" name="categoryoflivestock" class="form-control">
          <option value="">Select Category</option>
          <option value="None">None</option>
          <option value="Poultry">Poultry</option>
          <option value="Cattle">Cattle</option>
          <option value="Piggery">Piggery</option>
          <option value="Goats">Goats</option>
        </select>
      </div>
    </div>

      <div class="form-group">
      <label class="col-md-4 control-label" for="agrictraining">Have you received any Agricultural training?</label>
      <div class="col-md-4">
        <label class="radio-inline" for="yesagric">
          <input type="radio" name="agrictraining" id="yesagric" value="True">
          Yes
        </label>
        <label class="radio-inline" for="noagric">
          <input type="radio" name="agrictraining" id="noagric" value="False">
          No
        </label>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="yearsinagric">Years experience in Agriculture</label>
      <div class="col-md-3">
      <input id="textinput" name="yearsinagric" type="text" placeholder="Years' experience" class="form-control input-md">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="marketproximity">Proximity to the market</label>
      <div class="col-md-3">
        <select id="marketproximity" name="marketproximity" class="form-control">
          <option value="">Select Appropriate</option>
          <option value="P1">Very near</option>
          <option value="P2">Relatively near</option>
          <option value="P3">Far</option>
          <option value="P4">Very far</option>
          <option value="P5">No market nearby</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="valofprod">Value of production</label>
      <div class="col-md-3">
      <input id="valofprod" name="valofprod" type="text" placeholder="Amount in UGX" class="form-control input-md">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="agricincent">Any use of agricultural incentives?</label>
      <div class="col-md-4">
        <label class="radio-inline" for="yesincentives">
          <input type="radio" name="agricincent" id="yesincentives" value="True">
          Yes
        </label>
        <label class="radio-inline" for="noincentives">
          <input type="radio" name="agricincent" id="noincentives" value="False">
          No
        </label>
      </div>
    </div>

    <button class="btn btn-primary prevBtn pull-left" type="button">Previous</button>
    <button class="btn btn-success pull-right" type="submit" >Submit</button>

  </div>
</div>
</form>

</div>
