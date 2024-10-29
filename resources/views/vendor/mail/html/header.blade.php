@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === "Sinar Kaliman Sehat")
<img src="https://i1.wp.com/sinarkalimansehat.com/wp-content/uploads/2020/04/2875F109-AEC3-4E99-AFF4-6DB1205C8862-1-e1587021510357.png?w=2048&ssl=1" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
