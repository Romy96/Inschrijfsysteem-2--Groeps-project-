@extends('backend/menu')

@section('content_backend')

<h1>Creëren evenement</h1>

    <div class="row">
        <form role="form" method="post" action="create_event_action.php">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">   <!-- white background -->
                        <div class="box-body">      <!-- some whitespace -->
                            <div class="box-body">  
                                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                                <div class="form-group">
                                    <label for="txt_evenement">Evenement naam:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="event" name="event" placeholder="Vul een event in" required>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="afbeelding">Afbeelding achtergrond:</label>
                                     <div class="input-group">
                                        <input type="text" class="form-control" data-slug="source" placeholder="afbeelding achtergrond" id="afbeelding" name="afbeelding">
                                        <span class="custom-file-control"></span>
                                        <small class="text-muted">Put image URL from your documents or internet into the field.</small>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="banner">Banner:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-slug="source" placeholder="banner" id="banner" name="banner">
                                        <span class="custom-file-control"></span>
                                        <small class="text-muted">Put image URL from your documents or internet into the field.</small>
                                </div>
                                </div>
                                <div class='form-group'>
                                    <label for="startdatum">Startdatum:</label>
                                     <div class="input-group">
                                        <input class="form-control" data-slug="source" placeholder="startdatum" name="startdatum" type="datetime" id="startdatum">
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="startdatum">Einddatum:</label>
                                     <div class="input-group">
                                        <input class="form-control" data-slug="source" placeholder="einddatum" name="einddatum" type="datetime" id="einddatum">
                                    </div>
                                </div>
                                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>

@endsection