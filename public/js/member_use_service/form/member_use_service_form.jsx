var React = require('react');

// サービスselectフォーム
var SelectService = React.createClass({
    // stateの初期化
    getInitialState: function(){
        return {serviceValue: 'test'};
    },
    // text内の文字が変わった時stateをセットする
    handleChange: function(event){
        this.setState({serviceValue: event.target.value});
    },
    render: function() {
        var value = this.state.serviceValue;
        return(
            <div className="SelectService">
                <input type="text" value={value} onChange={this.handleChange} />
            </div>
        );
    }
});

// メンバーselectフォーム
var SelectMember = React.createClass({
    // stateの初期化
    getInitialState: function(){
        return {
            memberValue: 'test3'
        };
    },
    // text内の文字が変わった時stateをセットする
    handleChange: function(event){
        this.setState({memberValue: event.target.value});
    },
    render: function() {
        var value = this.state.memberValue;
        return(
            <div className="SelectMember">
                <input type="text" value={value} onChange={this.handleChange} />
            </div>
        );
    }
});

// submitフォーム
var Submit = React.createClass({
    render: function() {
        return(
            <div className="Submit">
                <input type="submit" value="submit" />
            </div>
        );
    }
});

// formまとめ
var MemberUseServiceForm = React.createClass({
    render: function() {
        return(
            <div className="MemberUseServiceForm">
                <SelectMember />
                <SelectService />
                <Submit />
            </div>
        );
    }
});

module.exports = MemberUseServiceForm;

