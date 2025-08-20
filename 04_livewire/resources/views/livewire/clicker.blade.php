
<div >
    <form action="" wire:submit.prevent="createNewUser" style="display: flex; flex-direction: column; width: 400px;  gap: 1rem;">

        @if(session('success'))
            <span>{{session('success')}}</span>
        @endif
        <label for="">Name</label>
        <input wire:model="name" type="text" name="name">
        @error('name')
            <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror

        <label for="">Email</label>
        <input wire:model="email" type="email" name="email">
        @error('email')
            <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror

        <label for="">Password</label>
        <input wire:model="password" type="password" name="password">
        @error('password')
            <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror

        <button>Submit</button>
    </form>
   @forelse($users as $user)
        {{$user->name;}} 
        <br>

        @empty
        <p>No post available</p>
   @endforelse
</div>
