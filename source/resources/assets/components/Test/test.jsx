'use strict';

import React from 'react';

class Test extends React.Component {
	render() {
		return (
			<div className="test-container">
				<h2>Testing</h2>
				{this.props.children}
			</div>
		);
	}
}

export default Test;