<h3>Edit a note:</h3>

<form method="post" action="<?php echo URL;?>note/editSave/<?php echo $this->note[0]->note_id;?>">


	<label>Title   </label>
			<input type="text" name="title" value="<?php echo $this->note[0]->title;?>"/>

			 <br /><br />

	<label>Content</label>
			<textarea type="text" name="content" row"5" cols="60"><?php echo $this->note[0]->content;?></textarea>
	 <br /><br />
	<label>&nbsp;</label>
		<input type="submit" value="Hit me up"/>

</form>