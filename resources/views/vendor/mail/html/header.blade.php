<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="http://market.regnbows.com/public/portal/img/logo.png" height="150" width="150" class="logo"
                alt="">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>