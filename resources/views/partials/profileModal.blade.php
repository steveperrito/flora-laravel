<!-- Modal -->
<div class="modal fade" id="myProfileModal" tabindex="-1" role="dialog" aria-labelledby="myProfileModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myProfileModalLabel">Update your profile...</h4>
            </div>
            <div class="modal-body">

                @include('errors.warn')

                {!! Form::model($profile) !!}

                <!-- street field -->
                <div class="form-group {{$errors->has('street') ? 'has-error' : ''}}">
                    {!! Form::label('street', 'Street:') !!}
                    {!! Form::text('street', null, ['class' => 'form-control']) !!}
                </div>

                <!-- city field -->
                <div class="form-group {{$errors->has('city') ? 'has-error' : ''}}">
                    {!! Form::label('city', 'City:') !!}
                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                </div>

                <!-- state field -->
                <div class="form-group {{$errors->has('state') ? 'has-error' : ''}}">
                    {!! Form::label('state', 'State:') !!}
                    {!! Form::text('state', null, ['class' => 'form-control']) !!}
                </div>

                <!-- post_code field -->
                <div class="form-group {{$errors->has('post_code') ? 'has-error' : ''}}">
                    {!! Form::label('post_code', 'Postal Code:') !!}
                    {!! Form::text('post_code', null, ['class' => 'form-control']) !!}
                </div>

                <!-- country field -->
                <div class="form-group {{$errors->has('country') ? 'has-error' : ''}}">
                    {!! Form::label('country', 'Country:') !!}
                    {!! Form::text('country', null, ['class' => 'form-control']) !!}
                </div>

                <!-- phone field -->
                <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                    {!! Form::label('phone', 'Phone:') !!}
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>

                <!-- website field -->
                <div class="form-group {{$errors->has('website') ? 'has-error' : ''}}">
                    {!! Form::label('website', 'Website:') !!}
                    {!! Form::text('website', null, ['class' => 'form-control']) !!}
                </div>

                <!-- facebook field -->
                <div class="form-group {{$errors->has('facebook') ? 'has-error' : ''}}">
                    {!! Form::label('facebook', 'Facebook:') !!}
                    {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
                </div>

                <!-- twitter field -->
                <div class="form-group {{$errors->has('twitter') ? 'has-error' : ''}}">
                    {!! Form::label('twitter', 'Twitter:') !!}
                    {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
                </div>

                <div class="text-center">
                    {!! Form::submit('Update Profile', ['class' => 'btn btn-success btn-lg']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>