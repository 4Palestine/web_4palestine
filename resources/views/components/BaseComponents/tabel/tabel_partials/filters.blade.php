@isset($text_filters)
    @foreach ($text_filters as $filter)
        <div class="col-12 col-md-{{ $filter['cols'] ?? '3' }} mt-2">
            <label for="{{ $filter['name'] }}" class="mb-1 ps-1 text-secondary">{{ ucwords($filter['label']) }}</label>
            <input class="form-control form-control-sm mb-1" type="text" name="{{ $filter['name'] }}"
                value="{{ request()->query($filter['name']) }}" placeholder="{{ $filter['label'] }}"/> {{--  @if(count($datas) <= 0) disabled @endif  --}}
        </div>
    @endforeach
@endisset

@isset($select_fixed_filters)
    @foreach ($select_fixed_filters as $filter)
        <div class="col-{{ $filter['cols'] ?? '3' }} mt-2">
            <label for="{{ $filter['name'] }}" class="mb-1 ps-1 text-secondary">{{ ucwords($filter['label']) }}</label>
            <div class="input-group input-group-sm">
                <select name="{{ $filter['name'] }}" id="{{ $filter['name'] }}" class="form-select form-select-sm">
                    <option value="">All</option>
                    @foreach ($filter['options'] as $option)
                        <option value="{{ $option['option_value'] }}" @selected($option['option_value'] == request($filter['name']))>
                            {{ $option['option_label'] }}</option>
                    @endforeach
                </select>
                <button class="btn btn-dark" type="submit">Filter</button>
            </div>
        </div>
    @endforeach
@endisset
