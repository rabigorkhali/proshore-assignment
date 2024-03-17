@if(session()->has('failures'))
    <table class="table table-danger table-striped">
        <tr>
            <th>{{('Row')}}</th>
            <th>{{('Attribute')}}</th>
            <th>{{('Errors')}}</th>

        </tr>
        @foreach(session()->get('failures') as $validation)
            <tr>
                <td>{{$validation->row()}}</td>
                <td>{{ucwords(str_replace('_',' ',$validation->attribute()))}}</td>
                <td>
                    <ul>
                        @foreach($validation->errors() as $error)
                            <li>{{(str_replace('_',' ',$error))}}</li>
                        @endforeach
                    </ul>
                </td>

            </tr>
        @endforeach
    </table>
@endif
