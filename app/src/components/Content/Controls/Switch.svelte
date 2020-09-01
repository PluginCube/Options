<script>
	export let value = false;

    let toggle = () => {
        value = !value;
    }
</script>

<style>
    div {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 22px;
    }

    div.true span {
        background-color: #20d678;
    }

    div.true span:before {
        transform: translateX(21px);
    }

    div span {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color:rgb(217, 223, 230);
        -webkit-transition: 0.4s;
        transition: 0.4s;
        border-radius: 34px;
    }

    div span:before {
        position: absolute;
        content: "";
        height: 15px;
        width: 15px;
        left: 4px;
        bottom: 3.5px;
        background-color: #fff;
        -webkit-transition: 0.4s;
        transition: 0.4s;
        border-radius: 50%;
        box-shadow: 0px 0px 5px rgba(0,0,0, 0.06);
    }

</style>

<div on:click={toggle} class="{value}">
    <span></span>
</div>
