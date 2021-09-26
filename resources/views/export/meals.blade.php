@foreach ($data[3] as $index => $datum)
    <div class="col-lg-4">
        <table>
            <thead>
                <tr>
                    <th colspan="4" style="border: 1px solid black; margin-left: auto; margin-right: auto;">{{$data[0]}} {{$data[1]}} {{$data[2]}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 1px solid black;">Name: </td>
                    <td colspan="3" style="border: 1px solid black;">{{$datum->name}} {{$datum->surname}}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">Breakfast</td>
                    <td style="@if ($datum->breakfast == 1) background-color: green; @endif border: 1px solid black;">
                        😀
                        
                    </td>
                    <td style="@if ($datum->breakfast == 2) background-color: green; @endif border: 1px solid black;">
                        😐
                    </td>
                    <td style="@if ($datum->breakfast == 3) background-color: green; @endif border: 1px solid black;">
                        😥
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">Water</td>
                    <td style="@if ($datum->water == 1) background-color: green; @endif border: 1px solid black;">
                        😀
                        
                    </td>
                    <td style="@if ($datum->water == 2) background-color: green; @endif border: 1px solid black;">
                        😐
                    </td>
                    <td style="@if ($datum->water == 3) background-color: green; @endif border: 1px solid black;">
                        😥
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">Vegetables</td>
                    <td style="@if ($datum->vegetables == 1) background-color: green; @endif border: 1px solid black;">
                        😀
                        
                    </td>
                    <td style="@if ($datum->vegetables == 2) background-color: green; @endif border: 1px solid black;">
                        😐
                    </td>
                    <td style="@if ($datum->vegetables == 3) background-color: green; @endif border: 1px solid black;">
                        😥
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">Protein</td>
                    <td style="@if ($datum->protein == 1) background-color: green; @endif border: 1px solid black;">
                        😀
                        
                    </td>
                    <td style="@if ($datum->protein == 2) background-color: green; @endif border: 1px solid black;">
                        😐
                    </td>
                    <td style="@if ($datum->protein == 3) background-color: green; @endif border: 1px solid black;">
                        😥
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">Carbohydrate</td>
                    <td style="@if ($datum->carbohydrate == 1) background-color: green; @endif border: 1px solid black;">
                        😀
                        
                    </td>
                    <td style="@if ($datum->carbohydrate == 2) background-color: green; @endif border: 1px solid black;">
                        😐
                    </td>
                    <td style="@if ($datum->carbohydrate == 3) background-color: green; @endif border: 1px solid black;">
                        😥
                    </td>
                </tr>
            </tbody>
        </table>
    </div>  
@endforeach 
