@foreach($Users as $user_one)


    @if(request()->UserID == $user_one->id)


    <div class="bg-primary rounded " style="height: 40px;width: 193px;margin-left: 4px;margin-top: 5px;"><a href="?UserID={{$user_one->id}}"><p
                class="text-left d-inline float-left"
                style="margin-top: 4px;margin-left: 6px;margin-right: 7px;color: rgb(255,255,255);">{{\Illuminate\Support\Str::limit($user_one->UserName , 12)}}</p>
        </a>
        <div style="float: right">
            <button class=" btn btn-dark text-center border rounded-circle" type="button"
                    style="width: 30px;margin-left: 34px;height: 28px;padding: 1px;margin-top: 3px;">

                {{\App\Chat::where([['BoothID' , $Booth->id],['UserID' , $user_one->id],['Sender' , 'Visitor'],['Status' , 'New']])->count()}}

            </button>
        </div>
    </div>


    @else

    <div style="height: 40px;width: 193px;margin-left: 4px;margin-top: 5px;"><a href="?UserID={{$user_one->id}}"><p
                class="text-left d-inline float-left"
                style="margin-top: 4px;margin-left: 6px;margin-right: 7px;color: rgb(255,255,255);">{{\Illuminate\Support\Str::limit($user_one->UserName , 12)}}</p>
        </a>
        <div style="float: right">
            <button class=" btn @if (\App\Chat::where([['BoothID' , $Booth->id],['UserID' , $user_one->id],['Sender' , 'Visitor'],['Status' , 'New']])->count() > 0) btn-success @else btn-dark @endif text-center border rounded-circle" type="button"
                    style="width: 30px;margin-left: 34px;height: 28px;padding: 1px;margin-top: 3px;">

                {{\App\Chat::where([['BoothID' , $Booth->id],['UserID' , $user_one->id],['Sender' , 'Visitor'],['Status' , 'New']])->count() == 0 ? '0' : \App\Chat::where([['BoothID' , $Booth->id],['UserID' , $user_one->id],['Sender' , 'Visitor'],['Status' , 'New']])->count()}}

            </button>
        </div>
    </div>


    @endif






@endforeach
