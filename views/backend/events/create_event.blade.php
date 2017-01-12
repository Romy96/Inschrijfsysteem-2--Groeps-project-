@extends('backend/menu')

@section('content_backend')

<h1>Creëren event</h1>

    <div class="row">
        <form role="form" method="post" action="create_event_action.php">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="txt_evenement">Evenement naam:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="event" name="event" placeholder="Vul een event in" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>

@endsection