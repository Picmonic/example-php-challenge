'use strict';

import React from 'react';
global.jQuery = require('jquery');
global.Tether = require('tether');
require('bootstrap');

class Commits extends React.Component {
	render() {
		let { repository, perPage } = this.props.params;
		return (
			<div className="container">
				<div className="col-xs-12">
					<h1>Commit Overview for {repository}</h1>
				</div>
			</div>
		);
	}

	componentDidMount() {
		// Hit the API
	}
}

export default Commits;