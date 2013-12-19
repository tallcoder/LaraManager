{{ Form::file('file1') }}
{{ Form::label('perm1' ,'Who can view this?') }}
All{{ Form::radio('perm1', 'all') }}
Staff{{ Form::radio('perm1', 'staff') }}
Admin{{ Form::radio('perm1', 'admin') }}<br />
{{ Form::file('file2') }}
{{ Form::label('perm2' ,'Who can view this?') }}
All{{ Form::radio('perm2', 'all') }}
Staff{{ Form::radio('perm2', 'staff') }}
Admin{{ Form::radio('perm2', 'admin') }}<br />
{{ Form::file('file3') }}
{{ Form::label('perm3' ,'Who can view this?') }}
All{{ Form::radio('perm3', 'all') }}
Staff{{ Form::radio('perm3', 'staff') }}
Admin{{ Form::radio('perm3', 'admin') }}