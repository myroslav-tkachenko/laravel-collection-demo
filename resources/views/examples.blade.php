@extends('template')


@section('body')
    <pre>


    {{ $title }}

    <?php $bladeVariable = '' ?>
    // Parsed as Blade; the value of $bladeVariable is echoed to the view
    {{ $bladeVariable }}

    {{-- // @ is removed, and "{{ handlebarsVariable }}" echoed to the view directly --}}
    @{{ handlebarsVariable }}

    <?php $talks = 1; ?>
    @if (count($talks) === 1)
        There is one talk at this time period.
    @elseif (count($talks) === 0)
        There are no talks at this time period.
    @else
        There are {{ count($talks) }} talks at this time period.
    @endif
    </pre>

    <?php $logged = false ?>


    @unless ($logged)

        YOU ARE NOT LOGGED IN!

    @else

        YOU ARE LOGGED

    @endunless

    <ul>
        @each('partials.user_list_item', $users, 'user')
    </ul>

    @forelse ($users as $user)

        <li>{{ $user }} <br>
            {{ var_dump($loop) }}
        </li>

    @empty

        <p>No users</p>

    @endforelse

@endsection