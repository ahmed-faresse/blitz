  <div class="container main">
  <?php echo form_open('verifycreateevent', array('class' => 'form-createevent')); ?>
  <?php if (validation_errors() != '') { ?>
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>Error !</strong><br/><br/><?php echo validation_errors();?>
            </div>
          </div>
        </div>
    <?php } ?>
  <div class="row form-group">
    <div class="col-md-12">
      <label for="name">Name</label>
      <input name="name" id="name" type="text" value="<?php echo set_value('name'); ?>" autofocus>
    </div>
  </div>

   <div class="row margin">
          <div class="col-md-4 col-md-offset-4">
          <label for="jeu">Jeux</label>
          <select name="jeu" id="jeu" type="image_path" class="form-control" value="<?php echo set_value('jeu'); ?>">
            <option>Leagues of Legends</option>
            <option>Starcraft 2</option>
            <option>Fifa 15</option>
          </select> 
          <span class="help-block"></span>
        </div>
  </div>
  <div class="row margin">
    <div class="col-md-10 col-md-offset-1">
      <label for="short_description">Short description</label>
      <textarea row="3" name="short_description" id="short_description" type="text" class="form-control" value="<?php echo set_value('short_description'); ?>"></textarea> 
      <span class="help-block"></span>
    </div>
  </div>

  <div class="row margin">
    <div class="col-md-10 col-md-offset-1">
      <label for="description">Description</label>
      <textarea name="description" id="description" type="text" class="form-control" rows="10" value="<?php echo set_value('description'); ?>"></textarea>
    </div>
  </div>
  <div class="row margin">
    <div class="col-md-4 col-md-offset-4 place">
      <i class="fa fa-map-marker"></i>
      <label for="place">Place</label>
      <input name="place" id="place" type="text" class="form-control" value="<?php echo set_value('place'); ?>">
      <p id="dates"></p>
    </div>
  </div>
  <div class="row margin">
    <div class="col-md-3 col-md-offset-2 date">
      <i class="fa fa-calendar"></i>
      <label for="date">Date</label>
      <input name="date" id="date" type="text" class="form-control" value="<?php echo set_value('date'); ?>">
    </div>
    <div class="col-md-3 col-md-offset-2 date">
      <i class="fa fa-clock-o"></i>
      <label for="time">Time</label>
      <input name="time" id="time" type="text" class="form-control">
    </div>
  </div>


   <div class="row margin">
    <div class="col-md-4 col-md-offset-4">
          <label for="price_asked">Price asked</label>
          <input name="price_asked" id="price_asked" type="text" class="form-control" value="<?php echo set_value('price_asked'); ?>"> 
          <span class="help-block"></span>
      </div>
    </div>

  <div class="row margin">
      <div class="col-md-4 col-md-offset-4">
          <label for="max_people">Max People</label>
          <input name="max_people" id="max_people" type="text" class="form-control" value="<?php echo set_value('max_people'); ?>"> 
          <span class="help-block"></span>
      </div>
  </div>

  <div class="row margin ctrevent">
    <div class="col-md-4 col-md-offset-4">
      <button class="btn btn-block btn-info" type="submit">Create the event</button>
    </div>
  </div>
  </form>
</div>