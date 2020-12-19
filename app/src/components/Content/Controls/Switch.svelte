<script>
    export let value = false

    $: if (typeof value == 'string') {
        value = JSON.parse(value)
    }

    let toggle = () => {
        value = !value
    }
</script>

<style lang="scss">
    div {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 23px;

        &.active span {
            background-color: #20d678;
        }

        &.active span:before {
            transform: translateX(21px);
        }

        span {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #d8dee4;
            transition: 0.4s;
            border-radius: 34px;
        }

        span:before {
            position: absolute;
            content: '';
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: #fff;
            -webkit-transition: 0.4s;
            transition: 0.4s;
            border-radius: 50%;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.06);
        }
    }
</style>

<div on:click={toggle} class:active={value}><span /></div>