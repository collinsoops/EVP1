<?php //include('db_connect.php');?>

<style>
#styleinput > input {
  /* HIDE RADIO */
  visibility: hidden;
  /* Makes input not-clickable */
  position: absolute;
  /* Remove input from document flow */
}

#styleinput > input + img {
  /* IMAGE STYLES */
  cursor: pointer;
  border: 2px solid transparent;
}

#styleinput > input:checked + img {
  /* (RADIO CHECKED) IMAGE STYLES */
  border: 2px solid #f00;
}

#styleinput > input:checked ~ span.overlay-image {
  display: block;
}

.parent {
  float: left;
  margin: 0;
  position: relative;
}

.overlay-image {
  position: absolute;
  display: none;
  top: 0px;
  right: 0px;
  bottom: 0px;
  left: 0px;
  background-image: url('http://www.clker.com/cliparts/2/k/n/l/C/Q/transparent-green-checkmark-md.png');
  background-size: 60% 60%;
  background-position: top center;
  background-repeat: no-repeat;
}
</style>

<fieldset id="theme" style="margin:0; padding:0; border:none;">
  <div style="margin-top:10px;">
    <figure class="parent">
      <label id="styleinput">
        <input type="radio" name="theme" value="defaultlayout" />
        <img src="img/candidate/logo.PNG" 
        style="max-width:170px; margin-right:20px;" />
        <span class="overlay-image"></span>
        <figcaption id="caption" style="margin-left:10px; font-size:12px;"><b>Default</b>
          <br><a>Preview</a></figcaption>
      </label>
    </figure>
	
	
	
	
	  <figure class="parent">
      <label id="styleinput">
        <input type="radio" name="theme" value="defaultlayout" />
        <img src="img/candidate/logo.PNG" 
        style="max-width:170px; margin-right:20px;" />
        <span class="overlay-image"></span>
        <figcaption id="caption" style="margin-left:10px; font-size:12px;"><b>Default</b>
          <br><a>Preview</a></figcaption>
      </label>
    </figure>
	
	
	
    <figure class="parent">
      <label id="styleinput">
        <input type="radio" name="theme" value="defaultlayout" />
        <img src="" 
        style="max-width:170px; margin-right:20px;" />
        <span class="overlay-image"></span>
        <figcaption id="caption" style="margin-left:10px; font-size:12px;"><b>Light</b>
          <br><a>Preview</a></figcaption>
      </label>
    </figure>
  </div>
</fieldset>
