<div class="table-responsive dt-responsive">
    <table id="row-callback" class="table table-hover">
        <thead>
            <tr>
                <th>{{ __('English') }}</th>
                <th>{{ __('Translation') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languageData as $key => $value)
                <tr>
                    <td>{{ __($key) }}</td>
                    <td class="translation-phrase" contenteditable
                        data-translation-key="{{$key}}" data-translation-id="{{ $helpers::encode($language->id) }}">
                        {{ $value }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>