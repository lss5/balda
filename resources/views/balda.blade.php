<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Balda</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        <h1 class="text-2xl text-center mt-10">Игра "БАЛДА"</h1>
        <div class="w-full flex flex-col justify-center items-center">
            <table class="border-solid border-2 text-lg">
                <tr>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">и</td>
                </tr>
                <tr>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">т</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">о</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">ч</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">к</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">и</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">а</td>
                </tr>
                <tr>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">н</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">е</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">б</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">о</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">к</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">у</td>
                </tr>
                <tr>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">с</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">о</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">л</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">н</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">ц</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">е</td>
                </tr>
                <tr>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase">ь</td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                </tr>
                <tr>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                    <td class="border-solid border-2 w-8 h-8 text-center uppercase"></td>
                </tr>
            </table>
            <table class="border-solid border-2 text-md mt-2">
                @foreach ($words as $word)
                <tr><td class="border-solid border-2 w-8 h-8 text-center uppercase">{{ $word }}</td></tr>
                @endforeach
            </table>
        </div>
    </body>
</html>
