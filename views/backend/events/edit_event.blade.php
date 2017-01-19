@extends('backend/menu')

@section('content_backend')

@if(isset($event))
<h1>Creëren evenement</h1>

    <div class="row">
        <form role="form" method="post" action="edit_event_action.php">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">   <!-- white background -->
                        <div class="box-body">      <!-- some whitespace -->
                            <div class="box-body">  
                                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                                <div class="form-group">
                                    <label for="txt_evenement">Evenement naam:</label>
                                    <div class="input-group">
                                    	<input type="hidden" name="id" value="{{$event['id']}}">
                                        <input type="text" class="form-control" id="event" name="event"  value="{{$event['title']}}" required>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="afbeelding">Afbeelding achtergrond:</label>
                                     <div class="input-group">
                                        <input type="text" class="form-control" data-slug="source" value="{{$event['small_banner_url']}}" id="afbeelding" name="afbeelding">
                                        <span class="custom-file-control"></span>
                                        <small class="text-muted">Put image URL from your documents or internet into the field.</small>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="banner">Banner:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-slug="source" value="{{$event['large_banner_url']}}" id="banner" name="banner">
                                        <span class="custom-file-control"></span>
                                        <small class="text-muted">Put image URL from your documents or internet into the field.</small>
                                </div>
                                </div>
                                <div class='form-group'>
                                    <label for="startdatum">Startdatum:</label>
                                     <div class="input-group">
                                        <input class="form-control" data-slug="source" value="{{$event['start_date']}}" name="startdatum" type="date" id="startdatum">
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="startdatum">Einddatum:</label>
                                     <div class="input-group">
                                        <input class="form-control" data-slug="source" value="{{$event['end_date']}}" name="einddatum" type="date" id="einddatum">
                                    </div>
                                </div>
                                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>
  @endif

@endsection