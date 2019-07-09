@extends('layouts.layoutindex')

@section('content')

    <div class="container">
        <div class="container-component">

            <div class="pageWrap">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">{{ Config::get('defaultcfg.defaultcfg.M3DC_SEMINAR_TITLE') }}</div>
                    <div class="panel-body">
                        <pre class="list-unstyled">日程 : {{ Config::get('defaultcfg.defaultcfg.SEMI_INFO_DATE') }}
演題 : {{ Config::get('defaultcfg.defaultcfg.SEMI_INFO_TITLE') }}
演者 : {{ Config::get('defaultcfg.defaultcfg.SEMI_INFO_PROF') }}</pre>

                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <!-- iframe コード入力 -->
                                <iframe src="/img/m3dc_logo.png" width="500" height="550" sandbox class="center-block"></iframe>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <p class="glyphicon glyphicon-warning-sign text-danger">　PCでご視聴の場合はVPNを切断しご覧ください</p>
                    </div>
                </div>

                <div class="col-sm-12 contactBox">
                    <a target="_blank" href="{{ Config::get('defaultcfg.defaultcfg.INQUIRY_URL') }}">接続に関する技術的な質問等ございましたら、こちらからお問い合わせ下さい。</a>
                </div>
            </div>

        </div>
    </div>

@endsection
