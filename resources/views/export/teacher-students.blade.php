<table style="width:100%">
    <tr>
        <td><h4><strong>{{$data['teacher']->name}}</strong></h4></td>
        <td><h4><strong>{{$data['teacher']->surname}}</strong></h4></td>
    </tr>
    <tr>
        <td style="background-color: #D5D8DC;"><strong>student_name</strong></td>
        <td style="background-color: #D5D8DC;"><strong>student_surname</strong></td>
        <td style="background-color: #D5D8DC;"><strong>mothers_name</strong></td>
        <td style="background-color: #D5D8DC;"><strong>mothers_surname</strong></td>
        <td style="background-color: #D5D8DC;"><strong>mothers_telephone</strong></td>
        <td style="background-color: #D5D8DC;"><strong>mothers_email</strong></td>
        <td style="background-color: #D5D8DC;"><strong>fathers_name</strong></td>
        <td style="background-color: #D5D8DC;"><strong>fathers_surname</strong></td>
        <td style="background-color: #D5D8DC;"><strong>fathers_telephone</strong></td>
        <td style="background-color: #D5D8DC;"><strong>fathers_email</strong></td>
    </tr>
    @for($i = 0; $i <= sizeof($data['students']) - 1; $i++)
        <tr>
            <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$data['students'][$i]->name ?? ""}}</td>
            <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$data['students'][$i]->surname ?? ""}}</td>
            <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$data['mothers'][$i][0]->name ?? ""}}</td>
            <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$data['mothers'][$i][0]->surname ?? ""}}</td>
            <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$data['mothers'][$i][0]->phone ?? ""}}</td>
            <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$data['mothers'][$i][0]->email ?? ""}}</td>
            <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$data['fathers'][$i][0]->name ?? ""}}</td>
            <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$data['fathers'][$i][0]->surname ?? ""}}</td>
            <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$data['fathers'][$i][0]->phone ?? ""}}</td>
            <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$data['fathers'][$i][0]->email ?? ""}}</td>
        </tr>
    @endfor
</table> 
