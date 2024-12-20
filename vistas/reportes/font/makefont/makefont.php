function getFile()
{
    if (isset($_FILES['ttf'])) {
        // get font file
        $tmp = $_FILES['ttf']['tmp_name'];
        $RESULT[] = '$tmp_name: ' . $tmp;
        $ttf = $_FILES['ttf']['name'];
        $RESULT[] = '$ttf: ' . $ttf;
        $a = explode('.', $ttf);
        if (strtolower($a[1]) != 'ttf') {
            $RESULT[] = 'NOT TTF FILE';
        }
        //die('File is not a .ttf');}
        if (!move_uploaded_file($tmp, $ttf)) {
            $RESULT[] = 'ERROR IN UPLOAD';
        }
        //die('Error in upload');
        $fontname = $_REQUEST['fontname'];
        if (empty($fontname)) {
            $fontname = $a[0];
        }
        $RESULT[] = 'FONT NAME: ' . $fontname;
        // AFM generation
        $RESULT[] = "ttf2pt1.exe -a " . $ttf . " " . $fontname;
        system("ttf2pt1.exe -a " . $ttf . " " . $fontname);
        // MakeFont call
        //$RESULT[] = 'MAKE FONT CALL ';
        //return $RESULT;
        MakeFont($ttf, "{$fontname}.afm", $_REQUEST['enc']);
        copy("{$fontname}.php", "../{$fontname}.php");
        unlink("{$fontname}.php");
        if (file_exists("{$fontname}.z")) {
            copy("{$fontname}.z", "../{$fontname}.z");
            unlink("{$fontname}.z");
        } else {
            copy($ttf, "../{$ttf}");
        }
        unlink("{$fontname}.afm");
        unlink("{$fontname}.t1a");
        unlink($ttf);
        echo "<script language='javascript'>alert('Font processed');\n";
        echo "window.location.href='addfont.php';</script>";
        //exit;
    }
    return $RESULT;
}