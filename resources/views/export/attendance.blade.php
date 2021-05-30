<table class="">      
    <thead>
        <tr>
            <td><h3><b><i>{{ $data['month'] }}</i></b></h3></td>
        </tr>
        <tr>
            <td><h3><b><i>{{ $data['name'] }}</i></b></h3></td>
        </tr>
        <tr>
            <th style="border: 1px solid black;" scope="col">#</th>
            
            @for($i=1;$i<=$data['days'];$i++)
                <th scope="row" style="border: 1px solid black;">{{substr('00' . $i, -2, 2)}}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach($data['students'] as $student)
            <tr>
                <th scope="row" style="border: 1px solid black;">{{$student->name}}</th>
                @for($i=1;$i<=$data['days'];$i++)
                    <td style="border: 1px solid black;
                        @foreach($data['attendances'] as $attendance)
                            @if($i == $attendance->day && $attendance->student_id == $student->id)
                                background-color: #B4F8C8;
                                
                                /* If you ever get the chance, make it so that any cell that doesn't contain information, have the cell colour of red. */
                            @endif
                        @endforeach
                    "></td>
                @endfor
            </tr>  
        @endforeach
    </tbody>
</table>