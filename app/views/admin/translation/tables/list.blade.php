<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>{{__('Language')}}</th>
                <th class="text-center">{{__('Code')}}</th>
                <th class="text-center">{{__('Layout')}}</th>
                <th class="text-center">{{__('Status')}}</th>
                <th class="text-end"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
                <tr>
                    <td>{{ $language->name }}</td>
                    <td class="text-center">{{ strtoupper($language->iso) }}</td>
                    <td class="text-center cursor-pointer"
                        onclick="changeLangLayout('{{ $helpers::encode($language->id) }}')">
                        {{ strtoupper($language->layout) }}
                    </td>
                    <td class="text-center">
                        @if($language->status)
                            <span class="badge bg-success cursor-pointer" 
                                onclick="changeLangStatus('{{ $helpers::encode($language->id) }}')">
                                {{__('Active')}}
                            </span>
                        @else
                            <span class="badge bg-danger cursor-pointer" 
                                onclick="changeLangStatus('{{ $helpers::encode($language->id) }}')">
                                {{__('Inactive')}}
                            </span>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('language.view', $helpers::encode($language->id)) }}"
                            class="btn btn-primary rounded btn-sm">
                            <i class="ti ti-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>