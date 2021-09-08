<div>
    @if (session()->has('status'))
        <div class="alert alert-warning">
            <strong><h2>{{ session('status') }}</h2></strong>
        </div>
    @endif
    <div class="row">
        <button type="button" class="keypad-button" wire:click="btnOne">1</button>
        <button type="button" class="keypad-button" wire:click="btnTwo">2</button>
        <button type="button" class="keypad-button" wire:click="btnThree">3</button>
    </div>
    <div class="row">
        <button type="button" class="keypad-button" wire:click="btnFour">4</button>
        <button type="button" class="keypad-button" wire:click="btnFive">5</button>
        <button type="button" class="keypad-button" wire:click="btnSix">6</button>
    </div>
    <div class="row">
        <button type="button" class="keypad-button" wire:click="btnSeven">7</button>
        <button type="button" class="keypad-button" wire:click="btnEight">8</button>
        <button type="button" class="keypad-button" wire:click="btnNine">9</button>
    </div>
    <div class="row">
        <button type="button" class="go-button" wire:click="btnGo">Go</button>
    </div>
</div>
