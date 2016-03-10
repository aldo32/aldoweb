<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
        <?php print htmlentities($title) ?>
        </title>
    </head>
    <body>
        <?php
        if ( $errors ) {
            print '<ul class="errors">';
            foreach ( $errors as $field => $error ) {
                print '<li>'.htmlentities($error).'</li>';
            }
            print '</ul>';
        }
        ?>
        <form action="controller/WorkerController.php" method="POST" name="frm_SaveEmploye" id="frm-SaveEmploye">
            <div class="sec-title"> Personal Data </div>
            Name: <input type="txt" class="text" id="txt-DP-Name" name="txt_DP_Name"/>
            Birthday: <input type="txt" class="text" id="txt-DP-Birthday" name="txt_DP_Birthday"/>
            Email: <input type="txt" class="text" id="txt-DP-Email" name="txt_DP_Email"/>

            <br><br>
            <div class="sec-title"> Department </div>
            Name:
            <select class="slct" id="slct-D-Name" name="slct_D_Name">
                <option value="0">Choose an option</option>
                <option value="1">Network</option>
                <option value="2">Development</option>
            </select>

            <br><br>
            <div class="sec-title"> Job </div>
            Name: <input type="txt" class="text" id="txt-J-Name" name="txt_J_Name"/>
            Salary: <input type="txt" class="text" id="txt-J-Salary" name="txt_J_Salary"/>
            Has vacations:
            <input type="radio" class="rdo" id="rdo-J-Y" name="rdo_J_Vacations"/> Y
            <input type="radio" class="rdo" id="rdo-J-N" name="rdo_J_Vacations"/> N
            <br><br>
            <input type="submit" value="Send" id="btn-Send" name="btn_Send"/>
        </form>


    </body>
</html>
