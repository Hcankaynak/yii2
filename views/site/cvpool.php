<?php use yii\helpers\Html; ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Upload Your CV</title>
<?= Html::csrfMetaTags() ?>
</head>
<body>
<div id="header">
<h1 align ='center'>Upload Your CV to the pool</h1>
<h2 align = 'center'>What is that for?</h2>
<br>
<p align = 'center'>Some company will contact us about specific type student. If you upload your CV,
we can share your CV with them. They will contact directly you. If you don't like it you can't deny.</p>
<br>

</div>
<div id="body">
	<form action="cvpool" method="post" enctype="multipart/form-data">
	<input type="file" name="file" value="ZEZ6Y0xrY3ARGS42fTwhMQgkDgF6BCEGEx4SMXQMBR4CPy0iPCIwNQ==" />
	<button type="submit" name="btn-upload">upload</button>
	</form>
    <br /><br />
    <?php


    if(isset($_POST['btn-upload']))
    {

			$con=mysqli_connect("localhost","root","","deneme");
    	$file = rand(1000,100000)."-".$_FILES['file']['name'];
      $file_loc = $_FILES['file']['tmp_name'];
    	$file_size = $_FILES['file']['size'];
    	$file_type = $_FILES['file']['type'];
			$content = file_get_contents($_FILES['file']['tmp_name']);
			$content = mysqli_escape_string ($con,$content );


    	$folder="uploads/";

    	// new file size in KB
    	$new_size = $file_size/1024;
    	// new file size in KB

    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case

    	$final_file=str_replace(' ','-',$new_file_name);
    	if(move_uploaded_file($file_loc,$folder.$final_file))
    	{
    		$sql="INSERT INTO Cv(file,type,size,pat,fil) VALUES('$final_file','$file_type','$new_size','$file_loc','$content')";
				$extensions =array("jpg","jpeg","docx");
		    $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    		mysqli_query($con,$sql);
    		?>
    		<script>
    		alert('successfully uploaded');
            window.location.href='cvpool?success';
            </script>
    		<?php
    	}
    	else
    	{
    		?>
    		<script>
    		alert('error while uploading file');
            window.location.href='cvpool?fail';
            </script>
    		<?php
    	}
    }
    ?>
  <?php


	if(isset($_GET['success']))
	{
		?>
        <label>File Uploaded Successfully...  </label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Problem While File Uploading !</label>
        <?php
	}
	else
	{
		?>

        <?php
	}
	?>
</div>
<div id="footer">

</div>
</body>
</html>
