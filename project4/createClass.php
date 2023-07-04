
<?php
// //Start session
// require_once('includes/startsession.php');
//Insert page header
$page_title = 'Add a Class';
require_once('includes/header.php');
//Connection & application variables
// //require_once('appvars.php');
// require_once('connectvars.php');
// //Insert Navigation menu
// require_once('navmenu.php');


    if($_SESSION['error']) {
        echo $_SESSION['error'];
    }

?>

    <!-- <form enctype="multipart/form-data" method="post" action="<php echo $_SERVER['PHP_SELF']; ?>"> -->
    <form enctype="multipart/form-data" method="post" action="includes/createClass-inc.php">

        <legend>Enter Class Information</legend>
        <div class="bodydiv">
            <label for="clexist" class="longlabel">Is this an existing class (with the same street location?):</label><br />
            <label for="Y" class="indentshort" >Yes</label>
            <input type="radio" onClick="unhideElement()" name="clexist" id="existY" value=1 />
            <label for="N" class="short">No</label>
            <input type="radio" onClick="unhideElement()" name="clexist" id="existN" value=0 /><br />

            <!--
                <label for="clexist">
                    <input type="radio" name="clexist" id="Y" value="Y" <?php echo $clexist; ?>"/> Yes "
                </label>
                <label>
                    <input type="radio" name="clexist" id="N" value="N" <?php echo $clexist; ?>"/> No "
                </label><br />
            -->
            <div id="exist">
                <label for="clid" id="clid" class="indentlong">What is the class ID?:</label><br />
                <input type="text" class="indentlong" name="clid" size=10 value=" <?php if (!empty($username)) echo $username; ?>" /><br />
            </div>
            <span><label for="cltype" class="newlabel">Class Type:</label></span> <br />
            <select name="cltype">
                <optgroup label="Maternity">
                    <option value="cbe" label="cbe">Childbirth</option>
                    <option value="Tour" label="tour">Maternity Tour</option>
                    <option value="bc" label="bc">Baby Care</option>
                    <option value="bf" label="bf">Breastfeeding</option>
                </optgroup>
                <optgroup label="Wellness">
                    <option value="h&w" label="h&w">Health "&amp;" Wellness</option>
                    <option value="hh" label="HH">HeartHealth</option>
                </optgroup>
            </select><br />
            <label for="clsubtype" class="longlabel">Subtype (Related Classes):</label><br />
            <select name="clsubtype">
                <option value="" label=""></option>
                <optgroup label="Support Group">
                    <option value="Cancer" label="cancer">Cancer</option>
                </optgroup>
                <optgroup label="Senior">
                    <option value="Senior Health" label="SENH">Health</option>
                </optgroup>
            </select><br />
            <label for="clformat" class="longlabel">Class Format (Screening,
                Online, Class Series, Non-HGs):</label><br />
            <input type="radio" onClick="format()" id="formatScn" name="clformat" value="Scn"
                checked="checked" /> Screening
            <input type="radio" onClick="format()" name="clformat" value="O"/> Online
            <input type="radio" onClick="format()" id="formatSer" name="clformat" value="Ser"/> Series
            <input type="radio" onClick="format()" name="clformat" value="NonHGs"/> Non-Healthgrades<br />
    <!--
            <label for="clregreq">Registration Required?:</label><br />
            <input type="radio" name="clregreq" value="Yes" checked="checked" /> Yes
            <input type="radio" name="clregreq" value="No"/> No<br />

            <label for="clregphn">Phone number to register (if not HGs):</label><br />
            <input type="text" name="clregphn" /><br />
            <label for="clregweb">Website to reg (if not HGs):</label><br />
            <input type="text" name="clregphn" /><br />

            <label for="maxform" class="longlabel">How to Register
                (online, phone):</label><br />
            <input type="radio" name="maxform" value="Both"
                checked="checked" /> Phone & Online
            <input type="radio" name="maxform" value="Phone" /> Phone Only
            <input type="radio" name="maxform" value="Online"/> Online Only<br />
    -->
            <label for="clname" class="newlabel">Class Name:</label><br />
            <input type="text" name="clname" size=70 value=" <?php if (!empty($clname)) echo $clrname; ?>" /><br />
            <label for="cldesc" class="longlabel">Class Description:</label><br />
            <textarea name="cldesc" rows="4" cols="30"
                placeholder="Class description..." value=" <?php if (!empty($cldesc)) echo $cldesc; ?>"></textarea><br />
        <!--
            <label for="clinstr">Instructor:</label><br />
            <input type="text" name="clinstr" /><br />
            <label for="clinfowb">Website for more info:</label><br />
            <input type="text" name="clinfowb" /><br />

            <label for="clnoweb" class="longlabel">Show Online with Healthgrades?
                (Only if available):</label><br />
            <input type="radio" name="clnoweb" value="Yes" checked="checked" /> Yes
            <input type="radio" name="clnoweb" value="No"/> No<br />


            <label for="claudiovis">Online Description:</label><br />
            <textarea name="claudiovis" rows="4" cols="30" wrap="hard"
                placeholder="Class description..."></textarea><br />
-->
    </fieldset>
<!--
    <fieldset>


     <legend>Also included in Confirmation email</legend>
        <label for="clparking">Parking Instructions:</label><br />
            //need label for accessability - chk differences;
            need for textareas?, do you need id if you enclose input type=text inside label?
        <textarea name="clparking" id="clparking" rows="4" cols="30"
            wrap="hard" placeholder="Parking Instructions..."></textarea><br />
        <label for="clbring" class="longlabel">What do they need to
            bring/remember (if any)?:</label><br />
        <textarea name="clbring" id="clbring" rows="4" cols="30" wrap="hard"
            placeholder="What to Bring, What to Remember, etc. - separate by comma.."></textarea><br />
    </fieldset>
        -->

    <fieldset>
    <!--
        <label for="clxref">Tags:</label><br />
        <input type="text" name="clxref" /><br />
        -->
        <label for="clcostrg1" class="newlabel">Class Cost:</label><br />
        <input type="text" name="clcostrg1" size=5 value=" <?php if (!empty($clcostrg1)) echo $clcostrg1; ?>"/><br />
    <!--
        <label for="cldiscnt">Discounts Offered:</label><br />
        <textarea name="cldiscnt" rows="4" cols="30"
            placeholder="Discounts Offered - separate by commas.."></textarea><br />

        <label for="clwaitcl" class="longlabel">Waitlist? (Normally for non-reoccuring classes):</label><br />
        <input type="radio" name="clwaitcl" value="No" checked="checked" /> No
        <input type="radio" name="clwaitcl" value="Yes"/> Yes<br />
    -->
    </fieldset>
    <fieldset>
    <legend>Registration</legend>
        <label for="clreghow" class="longlabel">How to Register (everyone attending, etc):</label><br />
            <input type="radio" name="clreghow" value="P" checked="checked" /> Each Person
            <input type="radio" name="clreghow" value="C"/> Per Couple
            <input type="radio" name="clreghow" value="S"/> Can bring a free Support Person<br />
        <label for="clmax" class="longlabel">Maximum Capacity:</label><br />
        <input type="text" name="clmax" size=5 /><br />
        <!--
        <label for="cloverbk" class="longlabel">Overbooking (Is it ok to
            overbook prior to requesting approval?):</label><br />
        <textarea name="cloverbk" rows="4" cols="30"
            placeholder="Overbook instructions.."></textarea><br />


        <label for="clenrcrit" class="longlabel">Enrollment Criteria (+18,
            Membership, No Children - separate by comma):</label><br />
        <textarea name="clenrcrit" rows="4" cols="30" wrap="hard"
            placeholder="Enrollment Criteria - separate by comma.."></textarea><br />

        <label for="cldaytmnar">What days of the week?:</label><br />
        <input type="text" name="cldaytmnar" /><br />
        <label for="cllength" class="longlabel">How long is the class
            (in hours, ex 2.5)?: </label><br />
        <input type="text" name="cllength" size="32" /><br />
-->
<!--
    </fieldset>
    <fieldset>
         <label for="cldaytmnar">What days of the week?:</label><br />
         <input type="text" name="cldaytmnar" /><br />
         <input type="checkbox" name="cldaytmnar" value="Sun"  /> Sunday
         <input type="checkbox" name="cldaytmnar" value="Mon"  /> Monday
         <input type="checkbox" name="cldaytmnar" value="Tues"  /> Tuesday
         <input type="checkbox" name="cldaytmnar" value="Wed"  /> Wednesday
         <input type="checkbox" name="cldaytmnar" value="Thur"  /> Thursday
         <input type="checkbox" name="cldaytmnar" value="Friday"  /> Friday
         <input type="checkbox" name="cldaytmnar" value="Sat"  /> Saturday <br />
    </fieldset>
    -->
    <fieldset id="screen">
    <legend>Class Schedule:</legend>
    <!--
        <label for="clformat2" class="longlabel">Frequency (Single Dates,
            Series, InfoOnly):</label><br />
    -->
        <label for="cldatestr">Class Dates:</label>
        <input type="date" id="cldatestr" name="cldatestr" value=" <?php if (!empty($cldatestr)) echo $cldatestr; ?>"/><br />

        <label for="cltimestr">Start Time:</label>
        <input type="time" id="cltimestr" name="cltimestr" value=" <?php if (!empty($cltimestr)) echo $cltimestr; ?>"/><br />
        <label for="cltimeend">End Time:</label>
        <input type="time" id="cltimeend" name="cltimeend" value=" <?php if (!empty($cltimeend)) echo $cltimeend; ?>" size="32" /><br />
<!--
        <label for="cldatest02" class="newlabel">Class Date2:</label>
        <input type="date" id="cldatest02" name="cldatest02" /><br />
        <label for="cltimest02">Start Time2:</label>
        <input type="time" id="cltimest02" name="cltimest02" /><br />
        <label for="cltimeen02">End Time2:</label>
        <input type="time" id="cltimeen02" name="cltimeen02" size="32" /><br />
    -->
<!--
        <label for="another" class="longlabel">Would you like to add another date/time for this class/location?:</label><br />
            <input type="radio" onClick="anotherDate()" name="another" id="anotherN" value="N" checked="checked" /> No </input>
            <input type="radio" onClick="anotherDate()" name="another" id="anotherY" value="Y"/> Yes </input>

        <div id="anotherDiv">
            <label for="cldatest03">Class Date3:</label>
            <input type="date" id="cldatest03" name="cldatest03" /><br />
            <label for="cltimest03">Start Time3:</label>
            <input type="time" id="cltimest03" name="cltimest03" /><br />
            <label for="cltimen03">End Time3:</label>
            <input type="time" id="cltimen03" name="cltimen03" /><br />
        </div>
    -->
    </fieldset>
<!--
    <fieldset id="series">
    <legend></legend>

        <label for="clformat2" class="longlabel">Frequency (Single Dates,
            Series, InfoOnly):</label><br />
        <input type="text" id="clformat2" name="clformat2" /><br />

        <label for="cldatestr">Additional Series Dates:</label>
        <input type="date" id="cldatestr" name="cldatestr" value=" <?php if (!empty($cldatestr)) echo $cldatestr; ?>"/><br />

        <label for="clendat01">End Date1:</label>
        <input type="date" id="clendat01" name="clendat01" /><br />

        <label for="cltimestr">Start Time:</label>
        <input type="time" id="cltimestr" name="cltimestr" value=" <?php if (!empty($cltimestr)) echo $cltimestr; ?>"/><br />
        <label for="cltimeend">End Time:</label>
        <input type="time" id="cltimeend" name="cltimeend" value=" <?php if (!empty($cltimeend)) echo $cltimeend; ?>" size="32" /><br />

    -->
    <!--
        <label for="cldate02">Start Date2:</label>
        <input type="date" id="cldate02" name="cldate02" /><br />
        <label for="clendat02">End Date2:</label>
        <input type="date" id="clendat02" name="clendat02" /><br />
        <label for="cltimest02">Start Time:</label>
        <input type="time" id="cltimest02" name="cltimest02" /><br />
        <label for="cltimeen02">End Time:</label>
        <input type="time" id="cltimeen02" name="cltimeen02" size="32" /><br />
        <label for="cldate03">Start Date3:</label>
        <input type="date" id="cldate03" name="cldate03" /><br />
        <label for="clendat03">End Date3:</label>
        <input type="date" id="clendat03" name="clendat03" /><br />
        <label for="cltimest03">Start Time:</label>
        <input type="time" id="cltimest03" name="cltimest03" /><br />
        <label for="cltimen03">End Time:</label>
        <input type="time" id="cltimen03" name="cltimen03" size="32" /><br />
        <label for="cldate04">Start Date4:</label>
        <input type="date" id="cldate04" name="cldate04" /><br />
        <label for="clendat04">End Date4:</label>
        <input type="date" id="clendat04" name="clendat04" /><br />
        <label for="cltimest04">Start Time:</label>
        <input type="time" id="cltimest04" name="cltimest04" /><br />
        <label for="cltimen04">End Time:</label>
        <input type="time" id="cltimen04" name="cltimen04" size="32" /><br />
        <label for="cldate05">Start Date5:</label>
        <input type="date" id="cldate05" name="cldate05" /><br />
        <label for="clendat05">End Date5:</label>
        <input type="date" id="clendat05" name="clendat05" /><br />
        <label for="cltimest05">Start Time:</label>
        <input type="time" id="cltimest05" name="cltimest05" /><br />
        <label for="cltimen05">End Time:</label>
        <input type="time" id="cltimen05" name="cltimen05" size="32" /><br />
        <label for="cldate06">Start Date6:</label>
        <input type="date" id="cldate06" name="cldate06" /><br />
        <label for="clendat06">End Date6:</label>
        <input type="date" id="clendat06" name="clendat06" /><br />
        <label for="cltimest06">Start Time:</label>
        <input type="time" id="cltimest06" name="cltimest06" /><br />
        <label for="cltimen06">End Time:</label>
        <input type="time" id="cltimen06" name="cltimen06" size="32" /><br />
        <label for="cldate07">Start Date7:</label>
        <input type="date" id="cldate07" name="cldate07" /><br />
        <label for="clendat07">End Date7:</label>
        <input type="date" id="clendat07" name="clendat07" /><br />
        <label for="cltimest07">Start Time:</label>
        <input type="time" id="cltimest07" name="cltimest07" /><br />
        <label for="cltimen07">End Time:</label>
        <input type="time" id="cltimen07" name="cltimen07" size="32" /><br />
        <label for="cldate08">Start Date8:</label>
        <input type="date" id="cldate08" name="cldate08" /><br />
        <label for="clendat08">End Date8:</label>
        <input type="date" id="clendat08" name="clendat08" /><br />
        <label for="cltimest08">Start Time:</label>
        <input type="time" id="cltimest08" name="cltimest08" /><br />
        <label for="cltimen08">End Time:</label>
        <input type="time" id="cltimen08" name="cltimen08" size="32" /><br />
        <label for="cldate09">Start Date9:</label>
        <input type="date" id="cldate09" name="cldate09" /><br />
        <label for="clendat09">End Date9:</label>
        <input type="date" id="clendat09" name="clendat09" /><br />
        <label for="cltimest09">Start Time:</label>
        <input type="time" id="cltimest09" name="cltimest09" /><br />
        <label for="cltimen09">End Time:</label>
        <input type="time" id="cltimen09" name="cltimen09" size="32" /><br />
        <label for="cldate100">Start Date10:</label>
        <input type="date" id="cldate10" name="cldate10" /><br />
        <label for="clendat10">End Date10:</label>
        <input type="date" id="clendat10" name="clendat10" /><br />
        <label for="cltimest10">Start Time:</label>
        <input type="time" id="cltimest10" name="cltimest10" /><br />
        <label for="cltimen10">End Time:</label>
        <input type="time" id="cltimen10" name="cltimen10" size="32" /><br />

    </fieldset>
    <fieldset>
    <legend>Survey Questions:</legend>
        <label for="clsurvey" class="longlabel">Are there any questions
            that you want us to ask? (Doesn't include How Heard):</label><br />
        <textarea name="clsurvey" rows="4" cols="30" wrap="hard"
            placeholder="Questions to ask for registration - separate by comma.."></textarea><br />

    </fieldset>
    -->
    <fieldset>
    <legend>Class Location</legend>
        <label for="clhiname" class="longlabel">Sponsoring Facility:</label><br />
        <input type="text" name="clhiname" value=" <?php if (!empty($clhiname)) echo $clhiname; ?>" /><br />
        <label for="claddress1" class="newlabel">Address1:</label><br />
        <input type="text" name="claddress1" value=" <?php if (!empty($claddress1)) echo $claddress1; ?>" /><br />
        <label for="claddress2" class="longlabel">Address2 (Include Room):</label><br />
        <input type="text" name="claddress2" value=" <?php if (!empty($claddress2)) echo $claddress2; ?>"size="32" /><br />
        <label for="clcity" class="medium">City:</label>
        <input type="text" name="clcity" value=" <?php if (!empty($clcity)) echo $clcity; ?>"/><br />
        <label for="clstate" class="medium">State:</label>
        <input type="text" name="clstate" size=2 value=" <?php if (!empty($clstate)) echo $clstate; ?>"/>
        <label for="clzip" class="medium">Zipcode:</label>
        <input type="text" name="clzip" size=5 value=" <?php if (!empty($clzip)) echo $clzip; ?>"/><br />
    </fieldset>
    <fieldset>
    <legend class="longlabel">Coordinator/Rep Contact</legend>
     (Only fill in phone or email if the phone rep may contact)<br />
    <!--
        <label for="clmcname">Contact Name:</label><br />
        <input type="text" name="clmcname" /><br />
    -->
        <label for="clphone">Phone Number:</label><br />
        <input type="text" name="clphone" value=" <?php if (!empty($clphone)) echo $clphone; ?>"/><br />
    <!--
        <label for="clphone2">Phone 2:</label><br />
        <input type="text" name="clphone2" /><br />
        <label for="clemail">Email:</label><br />
        <input type="text" name="clemail" size="32" /><br />

    </fieldset>
    <fieldset>
    <legend>Class Schedule/Overbook Contact</legend>
        <label for="clinname">Contact Name:</label>
        <input type="text" name="clinname" /><br />
        <label for="clinphn">Phone Number:</label>
        <input type="text" name="clinphn" /><br />
        <label for="clineml">Email:</label>
        <input type="text" name="clineml" size="32" /><br />
-->

    </fieldset>
    </div>

    <!--
        <label for="clother" class="longlabel">Any other items/comments that
            doesn't fit above?</label><br />
        <textarea name="clother"></textarea><br />
        <input type="submit" value="Submit Class Entry" name="submit" />



    -->
        <input type="submit" value="Add Class" id="submit" name="submit" />
    </form>
    <?php

    //Insert Footer
    require_once('footer.php');

?>
