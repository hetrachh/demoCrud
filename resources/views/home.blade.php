<a  href="{{ url('/create')}}">Add Employee</a>
        @if (session('info'))
                {{session('info')}}
        @endif  
        <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>mployee E-mail</th>
                <th>Employee Contact Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($employee)>0)
                    @foreach ($employee->all() as $employees)
                    <tr>
                    <td>{{ $employees->Name }}</td>
                    <td>{{ $employees->EmailId }}</td>
                    <td>{{ $employees->ContactNumber }}</td>
                    <td>
                        <a href='{{ url("/update/{$employees->id}") }}' >Update</a>
                        <a href='{{ url("/delete/{$employees->id}") }}' >Delete</a>
                    </td>
                    </tr>  
                    @endforeach
                @endif
            </tbody>
          </table> 
    </div>
</div>