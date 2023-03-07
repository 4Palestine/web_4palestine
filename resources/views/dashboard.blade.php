{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('layouts.master')

@section('master')
    <div class="row">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="position: relative;">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Users</p>
                            <h4 class="mb-0 text-success">124</h4>
                        </div>
                        <div class="dropdown ms-auto">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots fs-4"></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Show Users</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Add New</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="chart15" style="min-height: 50px;">
                        <div id="apexchartswgo5v5pd" class="apexcharts-canvas apexchartswgo5v5pd apexcharts-theme-light"
                            style="width: 434px; height: 50px;"><svg id="SvgjsSvg2251" width="434" height="50"
                                xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG2253" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(0, 0)">
                                    <defs id="SvgjsDefs2252">
                                        <clipPath id="gridRectMaskwgo5v5pd">
                                            <rect id="SvgjsRect2258" width="440.5" height="52.5" x="-3.25"
                                                y="-1.25" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMaskwgo5v5pd">
                                            <rect id="SvgjsRect2259" width="438" height="54" x="-2"
                                                y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <linearGradient id="SvgjsLinearGradient2265" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop2266" stop-opacity="0.65" stop-color="rgba(18,191,36,0.65)"
                                                offset="0"></stop>
                                            <stop id="SvgjsStop2267" stop-opacity="0.5" stop-color="rgba(137,223,146,0.5)"
                                                offset="1"></stop>
                                            <stop id="SvgjsStop2268" stop-opacity="0.5" stop-color="rgba(137,223,146,0.5)"
                                                offset="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <line id="SvgjsLine2257" x1="53.75" y1="0" x2="53.75" y2="50"
                                        stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="53.75"
                                        y="0" width="1" height="50" fill="#b1b9c4" filter="none"
                                        fill-opacity="0.9" stroke-width="1"></line>
                                    <g id="SvgjsG2271" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG2272" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                        </g>
                                    </g>
                                    <g id="SvgjsG2274" class="apexcharts-grid">
                                        <g id="SvgjsG2275" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine2277" x1="0" y1="0" x2="434"
                                                y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2278" x1="0" y1="10" x2="434"
                                                y2="10" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2279" x1="0" y1="20" x2="434"
                                                y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2280" x1="0" y1="30" x2="434"
                                                y2="30" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2281" x1="0" y1="40" x2="434"
                                                y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2282" x1="0" y1="50" x2="434"
                                                y2="50" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG2276" class="apexcharts-gridlines-vertical" style="display: none;">
                                        </g>
                                        <line id="SvgjsLine2284" x1="0" y1="50" x2="434"
                                            y2="50" stroke="transparent" stroke-dasharray="0"></line>
                                        <line id="SvgjsLine2283" x1="0" y1="1" x2="0"
                                            y2="50" stroke="transparent" stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG2261" class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG2262" class="apexcharts-series" seriesName="Members"
                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath2269"
                                                d="M 0 50L 0 38C 18.987499999999997 38 35.2625 42 54.25 42C 73.2375 42 89.5125 16.450000000000003 108.5 16.450000000000003C 127.4875 16.450000000000003 143.7625 29.3 162.75 29.3C 181.7375 29.3 198.0125 22.25 217 22.25C 235.9875 22.25 252.2625 37.15 271.25 37.15C 290.2375 37.15 306.5125 4.950000000000003 325.5 4.950000000000003C 344.4875 4.950000000000003 360.7625 22.25 379.75 22.25C 398.7375 22.25 415.0125 37.15 434 37.15C 434 37.15 434 37.15 434 50M 434 37.15z"
                                                fill="url(#SvgjsLinearGradient2265)" fill-opacity="1" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-area" index="0"
                                                clip-path="url(#gridRectMaskwgo5v5pd)"
                                                pathTo="M 0 50L 0 38C 18.987499999999997 38 35.2625 42 54.25 42C 73.2375 42 89.5125 16.450000000000003 108.5 16.450000000000003C 127.4875 16.450000000000003 143.7625 29.3 162.75 29.3C 181.7375 29.3 198.0125 22.25 217 22.25C 235.9875 22.25 252.2625 37.15 271.25 37.15C 290.2375 37.15 306.5125 4.950000000000003 325.5 4.950000000000003C 344.4875 4.950000000000003 360.7625 22.25 379.75 22.25C 398.7375 22.25 415.0125 37.15 434 37.15C 434 37.15 434 37.15 434 50M 434 37.15z"
                                                pathFrom="M -1 50L -1 50L 54.25 50L 108.5 50L 162.75 50L 217 50L 271.25 50L 325.5 50L 379.75 50L 434 50">
                                            </path>
                                            <path id="SvgjsPath2270"
                                                d="M 0 38C 18.987499999999997 38 35.2625 42 54.25 42C 73.2375 42 89.5125 16.450000000000003 108.5 16.450000000000003C 127.4875 16.450000000000003 143.7625 29.3 162.75 29.3C 181.7375 29.3 198.0125 22.25 217 22.25C 235.9875 22.25 252.2625 37.15 271.25 37.15C 290.2375 37.15 306.5125 4.950000000000003 325.5 4.950000000000003C 344.4875 4.950000000000003 360.7625 22.25 379.75 22.25C 398.7375 22.25 415.0125 37.15 434 37.15"
                                                fill="none" fill-opacity="1" stroke="#12bf24" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="2.5" stroke-dasharray="0"
                                                class="apexcharts-area" index="0"
                                                clip-path="url(#gridRectMaskwgo5v5pd)"
                                                pathTo="M 0 38C 18.987499999999997 38 35.2625 42 54.25 42C 73.2375 42 89.5125 16.450000000000003 108.5 16.450000000000003C 127.4875 16.450000000000003 143.7625 29.3 162.75 29.3C 181.7375 29.3 198.0125 22.25 217 22.25C 235.9875 22.25 252.2625 37.15 271.25 37.15C 290.2375 37.15 306.5125 4.950000000000003 325.5 4.950000000000003C 344.4875 4.950000000000003 360.7625 22.25 379.75 22.25C 398.7375 22.25 415.0125 37.15 434 37.15"
                                                pathFrom="M -1 50L -1 50L 54.25 50L 108.5 50L 162.75 50L 217 50L 271.25 50L 325.5 50L 379.75 50L 434 50">
                                            </path>
                                            <g id="SvgjsG2263" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle2290" r="0" cx="54.25"
                                                        cy="42"
                                                        class="apexcharts-marker wkwyqu48rj no-pointer-events"
                                                        stroke="#ffffff" fill="#12bf24" fill-opacity="1"
                                                        stroke-width="2" stroke-opacity="0.9" default-marker-size="0">
                                                    </circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG2264" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine2285" x1="0" y1="0" x2="434"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                        class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine2286" x1="0" y1="0" x2="434"
                                        y2="0" stroke-dasharray="0" stroke-width="0"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG2287" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG2288" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG2289" class="apexcharts-point-annotations"></g>
                                </g>
                                <rect id="SvgjsRect2256" width="0" height="0" x="0" y="0"
                                    rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                    stroke-dasharray="0" fill="#fefefe"></rect>
                                <g id="SvgjsG2273" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)">
                                </g>
                                <g id="SvgjsG2254" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-dark" style="left: 66.25px; top: 17px;">
                                <div class="apexcharts-tooltip-series-group apexcharts-active" style="display: flex;">
                                    <span class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(18, 191, 36); display: none;"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-label"></span><span
                                                class="apexcharts-tooltip-text-value">160</span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 467px; height: 137px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="position: relative;">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">New Tasks</p>
                            <h4 class="mb-0 text-purple">25</h4>
                        </div>
                        <div class="dropdown ms-auto">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots fs-4"></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="chart16" style="min-height: 50px;">
                        <div id="apexcharts3ig17dfwf" class="apexcharts-canvas apexcharts3ig17dfwf apexcharts-theme-light"
                            style="width: 434px; height: 50px;"><svg id="SvgjsSvg2291" width="434" height="50"
                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <g id="SvgjsG2293" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(0, 0)">
                                    <defs id="SvgjsDefs2292">
                                        <linearGradient id="SvgjsLinearGradient2296" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop2297" stop-opacity="0.4"
                                                stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop2298" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop2299" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMask3ig17dfwf">
                                            <rect id="SvgjsRect2301" width="440.5" height="52.5" x="-3.25"
                                                y="-1.25" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                            </rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMask3ig17dfwf">
                                            <rect id="SvgjsRect2302" width="438" height="54" x="-2"
                                                y="-2" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                            </rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect2300" width="16.87777777777778" height="50" x="0"
                                        y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                        stroke-dasharray="3" fill="url(#SvgjsLinearGradient2296)"
                                        class="apexcharts-xcrosshairs" y2="50" filter="none" fill-opacity="0.9">
                                    </rect>
                                    <g id="SvgjsG2316" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG2317" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                        </g>
                                    </g>
                                    <g id="SvgjsG2319" class="apexcharts-grid">
                                        <g id="SvgjsG2320" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine2322" x1="0" y1="0" x2="434"
                                                y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2323" x1="0" y1="10" x2="434"
                                                y2="10" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2324" x1="0" y1="20" x2="434"
                                                y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2325" x1="0" y1="30" x2="434"
                                                y2="30" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2326" x1="0" y1="40" x2="434"
                                                y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine2327" x1="0" y1="50" x2="434"
                                                y2="50" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG2321" class="apexcharts-gridlines-vertical" style="display: none;">
                                        </g>
                                        <line id="SvgjsLine2329" x1="0" y1="50" x2="434"
                                            y2="50" stroke="transparent" stroke-dasharray="0"></line>
                                        <line id="SvgjsLine2328" x1="0" y1="1" x2="0"
                                            y2="50" stroke="transparent" stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG2304" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG2305" class="apexcharts-series" rel="1"
                                            seriesName="NewxTasks" data:realIndex="0">
                                            <path id="SvgjsPath2307"
                                                d="M 15.67222222222222 50L 15.67222222222222 40.96944444444445Q 22.86111111111111 35.03055555555556 30.049999999999997 40.96944444444445L 30.049999999999997 40.96944444444445L 30.049999999999997 50L 30.049999999999997 50z"
                                                fill="rgba(137,50,255,1)" fill-opacity="1" stroke="#8932ff"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="2.5"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask3ig17dfwf)"
                                                pathTo="M 15.67222222222222 50L 15.67222222222222 40.96944444444445Q 22.86111111111111 35.03055555555556 30.049999999999997 40.96944444444445L 30.049999999999997 40.96944444444445L 30.049999999999997 50L 30.049999999999997 50z"
                                                pathFrom="M 15.67222222222222 50L 15.67222222222222 50L 30.049999999999997 50L 30.049999999999997 50L 30.049999999999997 50L 15.67222222222222 50"
                                                cy="38" cx="62.644444444444446" j="0" val="240"
                                                barHeight="12" barWidth="16.87777777777778"></path>
                                            <path id="SvgjsPath2308"
                                                d="M 63.894444444444446 50L 63.894444444444446 44.96944444444445Q 71.08333333333334 39.03055555555556 78.27222222222223 44.96944444444445L 78.27222222222223 44.96944444444445L 78.27222222222223 50L 78.27222222222223 50z"
                                                fill="rgba(137,50,255,1)" fill-opacity="1" stroke="#8932ff"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="2.5"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask3ig17dfwf)"
                                                pathTo="M 63.894444444444446 50L 63.894444444444446 44.96944444444445Q 71.08333333333334 39.03055555555556 78.27222222222223 44.96944444444445L 78.27222222222223 44.96944444444445L 78.27222222222223 50L 78.27222222222223 50z"
                                                pathFrom="M 63.894444444444446 50L 63.894444444444446 50L 78.27222222222223 50L 78.27222222222223 50L 78.27222222222223 50L 63.894444444444446 50"
                                                cy="42" cx="110.86666666666667" j="1" val="160"
                                                barHeight="8" barWidth="16.87777777777778"></path>
                                            <path id="SvgjsPath2309"
                                                d="M 112.11666666666667 50L 112.11666666666667 19.419444444444448Q 119.30555555555557 13.480555555555558 126.49444444444447 19.419444444444448L 126.49444444444447 19.419444444444448L 126.49444444444447 50L 126.49444444444447 50z"
                                                fill="rgba(137,50,255,1)" fill-opacity="1" stroke="#8932ff"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="2.5"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask3ig17dfwf)"
                                                pathTo="M 112.11666666666667 50L 112.11666666666667 19.419444444444448Q 119.30555555555557 13.480555555555558 126.49444444444447 19.419444444444448L 126.49444444444447 19.419444444444448L 126.49444444444447 50L 126.49444444444447 50z"
                                                pathFrom="M 112.11666666666667 50L 112.11666666666667 50L 126.49444444444447 50L 126.49444444444447 50L 126.49444444444447 50L 112.11666666666667 50"
                                                cy="16.450000000000003" cx="159.0888888888889" j="2"
                                                val="671" barHeight="33.55" barWidth="16.87777777777778"></path>
                                            <path id="SvgjsPath2310"
                                                d="M 160.3388888888889 50L 160.3388888888889 32.269444444444446Q 167.5277777777778 26.330555555555556 174.7166666666667 32.269444444444446L 174.7166666666667 32.269444444444446L 174.7166666666667 50L 174.7166666666667 50z"
                                                fill="rgba(137,50,255,1)" fill-opacity="1" stroke="#8932ff"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="2.5"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask3ig17dfwf)"
                                                pathTo="M 160.3388888888889 50L 160.3388888888889 32.269444444444446Q 167.5277777777778 26.330555555555556 174.7166666666667 32.269444444444446L 174.7166666666667 32.269444444444446L 174.7166666666667 50L 174.7166666666667 50z"
                                                pathFrom="M 160.3388888888889 50L 160.3388888888889 50L 174.7166666666667 50L 174.7166666666667 50L 174.7166666666667 50L 160.3388888888889 50"
                                                cy="29.3" cx="207.31111111111113" j="3" val="414"
                                                barHeight="20.7" barWidth="16.87777777777778"></path>
                                            <path id="SvgjsPath2311"
                                                d="M 208.56111111111113 50L 208.56111111111113 25.219444444444445Q 215.75000000000003 19.280555555555555 222.93888888888893 25.219444444444445L 222.93888888888893 25.219444444444445L 222.93888888888893 50L 222.93888888888893 50z"
                                                fill="rgba(137,50,255,1)" fill-opacity="1" stroke="#8932ff"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="2.5"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask3ig17dfwf)"
                                                pathTo="M 208.56111111111113 50L 208.56111111111113 25.219444444444445Q 215.75000000000003 19.280555555555555 222.93888888888893 25.219444444444445L 222.93888888888893 25.219444444444445L 222.93888888888893 50L 222.93888888888893 50z"
                                                pathFrom="M 208.56111111111113 50L 208.56111111111113 50L 222.93888888888893 50L 222.93888888888893 50L 222.93888888888893 50L 208.56111111111113 50"
                                                cy="22.25" cx="255.53333333333336" j="4" val="555"
                                                barHeight="27.75" barWidth="16.87777777777778"></path>
                                            <path id="SvgjsPath2312"
                                                d="M 256.78333333333336 50L 256.78333333333336 40.11944444444444Q 263.97222222222223 34.18055555555555 271.16111111111115 40.11944444444444L 271.16111111111115 40.11944444444444L 271.16111111111115 50L 271.16111111111115 50z"
                                                fill="rgba(137,50,255,1)" fill-opacity="1" stroke="#8932ff"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="2.5"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask3ig17dfwf)"
                                                pathTo="M 256.78333333333336 50L 256.78333333333336 40.11944444444444Q 263.97222222222223 34.18055555555555 271.16111111111115 40.11944444444444L 271.16111111111115 40.11944444444444L 271.16111111111115 50L 271.16111111111115 50z"
                                                pathFrom="M 256.78333333333336 50L 256.78333333333336 50L 271.16111111111115 50L 271.16111111111115 50L 271.16111111111115 50L 256.78333333333336 50"
                                                cy="37.15" cx="303.7555555555556" j="5" val="257"
                                                barHeight="12.85" barWidth="16.87777777777778"></path>
                                            <path id="SvgjsPath2313"
                                                d="M 305.0055555555556 50L 305.0055555555556 7.919444444444448Q 312.19444444444446 1.9805555555555578 319.3833333333334 7.919444444444448L 319.3833333333334 7.919444444444448L 319.3833333333334 50L 319.3833333333334 50z"
                                                fill="rgba(137,50,255,1)" fill-opacity="1" stroke="#8932ff"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="2.5"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask3ig17dfwf)"
                                                pathTo="M 305.0055555555556 50L 305.0055555555556 7.919444444444448Q 312.19444444444446 1.9805555555555578 319.3833333333334 7.919444444444448L 319.3833333333334 7.919444444444448L 319.3833333333334 50L 319.3833333333334 50z"
                                                pathFrom="M 305.0055555555556 50L 305.0055555555556 50L 319.3833333333334 50L 319.3833333333334 50L 319.3833333333334 50L 305.0055555555556 50"
                                                cy="4.950000000000003" cx="351.9777777777778" j="6"
                                                val="901" barHeight="45.05" barWidth="16.87777777777778"></path>
                                            <path id="SvgjsPath2314"
                                                d="M 353.2277777777778 50L 353.2277777777778 25.219444444444445Q 360.4166666666667 19.280555555555555 367.6055555555556 25.219444444444445L 367.6055555555556 25.219444444444445L 367.6055555555556 50L 367.6055555555556 50z"
                                                fill="rgba(137,50,255,1)" fill-opacity="1" stroke="#8932ff"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="2.5"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask3ig17dfwf)"
                                                pathTo="M 353.2277777777778 50L 353.2277777777778 25.219444444444445Q 360.4166666666667 19.280555555555555 367.6055555555556 25.219444444444445L 367.6055555555556 25.219444444444445L 367.6055555555556 50L 367.6055555555556 50z"
                                                pathFrom="M 353.2277777777778 50L 353.2277777777778 50L 367.6055555555556 50L 367.6055555555556 50L 367.6055555555556 50L 353.2277777777778 50"
                                                cy="22.25" cx="400.20000000000005" j="7" val="555"
                                                barHeight="27.75" barWidth="16.87777777777778"></path>
                                            <path id="SvgjsPath2315"
                                                d="M 401.45000000000005 50L 401.45000000000005 40.11944444444444Q 408.6388888888889 34.18055555555555 415.82777777777784 40.11944444444444L 415.82777777777784 40.11944444444444L 415.82777777777784 50L 415.82777777777784 50z"
                                                fill="rgba(137,50,255,1)" fill-opacity="1" stroke="#8932ff"
                                                stroke-opacity="1" stroke-linecap="square" stroke-width="2.5"
                                                stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask3ig17dfwf)"
                                                pathTo="M 401.45000000000005 50L 401.45000000000005 40.11944444444444Q 408.6388888888889 34.18055555555555 415.82777777777784 40.11944444444444L 415.82777777777784 40.11944444444444L 415.82777777777784 50L 415.82777777777784 50z"
                                                pathFrom="M 401.45000000000005 50L 401.45000000000005 50L 415.82777777777784 50L 415.82777777777784 50L 415.82777777777784 50L 401.45000000000005 50"
                                                cy="37.15" cx="448.4222222222223" j="8" val="257"
                                                barHeight="12.85" barWidth="16.87777777777778"></path>
                                        </g>
                                        <g id="SvgjsG2306" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine2330" x1="0" y1="0" x2="434"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                        class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine2331" x1="0" y1="0" x2="434"
                                        y2="0" stroke-dasharray="0" stroke-width="0"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG2332" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG2333" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG2334" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG2318" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)">
                                </g>
                                <g id="SvgjsG2294" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-dark">
                                <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(137, 50, 255);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-label"></span><span
                                                class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-dark">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 467px; height: 137px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
