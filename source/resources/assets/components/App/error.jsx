'use strict';

import React from 'react';

class Error extends React.Component {
	render() {
		return (
			<div class="alert alert-error">
				{this.props.children}
			</div>
		);
	}
}

export default Error;