const API_URL = '/api/Store/Profile'

async function parseResponse(response) {
  const payload = await response.json().catch(() => null)

  if (!response.ok || !payload?.status) {
    throw new Error(payload?.message || 'Request gagal diproses.')
  }

  return payload.data
}

export async function fetchStoreProfile() {
  const response = await fetch(`${API_URL}/show`, {
    method: 'GET',
    headers: {
      Accept: 'application/json',
    },
  })

  return parseResponse(response)
}

export async function saveStoreProfile(data) {
  const response = await fetch(`${API_URL}/save`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      Accept: 'application/json',
    },
    body: JSON.stringify(data),
  })

  return parseResponse(response)
}
