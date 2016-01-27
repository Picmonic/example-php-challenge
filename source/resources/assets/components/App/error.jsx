'use strict';

import React from 'react';

class Error extends React.Component {
	render() {
		return (
			<div className="alert alert-danger">
				{this.props.children}
			</div>
		);
	}
}

export default Error;