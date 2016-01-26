'use strict';

import React from 'react';
import ReactDOM from 'react-dom';
global.jQuery = require('jquery');
global.Tether = require('tether');
require('bootstrap');
const $ = jQuery;

import Commit from './commit.jsx';

class Commits extends React.Component {

	constructor(props) {
		super(props);
		this.state = { 
			repository: props.params.repository.replace(':', '/'), 
			perPage: props.params.perPage,
			commits: []
		};
	}

	render() {
		return (
			<div className="main container commits-container">
				<div className="col-xs-12">
					<h1>Commit Overview for {this.state.repository}</h1>
					<div id="commits" className="list-group">
						{this.state.commits.map((commit) => {
							return <Commit key={commit.sha} {...commit} />;
						})}
					</div>
				</div>
			</div>
		);
	}

	componentDidMount() {
		var parts = this.state.repository.split('/');
		var user = parts[0];
		var repo = parts[1];
		// Hit the localized PHP API
		jQuery.post({
			url: '/api/commits',
			data: {
				user: user,
				repository: repo,
				perPage: this.perPage,
				page: 1
			},
			success: ((res) => {
				this.setState({
					commits: res,
				});
			}).bind(this),
			dataType: 'json'
		});

		/* If we didn't need to save to the database we could just:
		jQuery.get({
			url: 'https://api.github.com/repos/' + repo + '/commits',
			success: (res) => {
				console.log(res);
			},
			dataType: 'json'
		});
		*/
	}
}

export default Commits;