<table>
    <tr>
        <td style="background-color: #D5D8DC;">Name</td>
        <td style="background-color: #D5D8DC;">Amount</td>
        <td style="background-color: #D5D8DC;">Letter</td>
        <td style="background-color: #D5D8DC;">Number</td>
    </tr>
    @foreach($data as $i => $datum)
    <tr>
        <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$datum->name}}</td>
        <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$datum->amount}}</td>
        <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$datum->shelf_sec}}</td>
        <td style="@if($i % 2 == 0) background-color: #F2F4F4; @else background-color: #FDFEFE; @endif">{{$datum->shelf_num}}</td>
    </tr>
    @endforeach
</table>
