# State Space Search

State space search is a fundamental problem-solving technique in Artificial Intelligence (AI) where we explore possible states to reach a goal state.

## 📌 Key Concepts

1. **State**: A representation of the problem at a given time.
2. **Initial State**: The starting point of the problem.
3. **Goal State**: The target or desired state.
4. **Operators (Actions)**: Rules that define state transitions.
5. **State Space**: The entire set of possible states.
6. **Search Strategy**: The method used to navigate the state space.

## 🔄 Steps in State Space Search

### **Step 1: Define the Problem**
- Identify the **initial state**.
- Define the **goal state**.
- List possible **actions**.

### **Step 2: Represent the State Space**
- Construct a **graph/tree** where:
  - Nodes represent **states**.
  - Edges represent **transitions**.

### **Step 3: Choose a Search Algorithm**
Two main categories:

#### **1️⃣ Uninformed (Blind) Search – No Prior Knowledge**
- **Breadth-First Search (BFS)**: Expands nodes level by level.
- **Depth-First Search (DFS)**: Explores as deep as possible first.
- **Uniform Cost Search (UCS)**: Expands the least-cost node first.

#### **2️⃣ Informed (Heuristic) Search – Uses Heuristics**
- **Greedy Best-First Search**: Expands the most promising node.
- **A* Search**: Combines cost-so-far and estimated cost to goal.

### **Step 4: Execute the Search**
- Start from the **initial state**.
- Apply operators to generate **new states**.
- Use a **queue (BFS), stack (DFS), or priority queue (A*)**.
- Continue until the **goal state** is reached or all states are exhausted.

### **Step 5: Solution Extraction**
- If the **goal state** is reached, trace back the path.
- If no solution exists, return **failure**.

## 🏁 Example: Solving a Maze

### **Problem Representation**
- **State**: Position in the maze.
- **Initial State**: Starting position.
- **Goal State**: Exit of the maze.
- **Operators**: Move up, down, left, or right.
- **State Space**: All possible paths.
- **Search Algorithm**: A* Search (for shortest path).

---

## 🛠 Example: Python Code for BFS

```python
from collections import deque

def bfs(graph, start, goal):
    queue = deque([(start, [start])])
    visited = set()
    
    while queue:
        node, path = queue.popleft()
        if node == goal:
            return path  # Return the path to the goal
        
        if node not in visited:
            visited.add(node)
            for neighbor in graph.get(node, []):
                queue.append((neighbor, path + [neighbor]))
    
    return None  # No path found

# Example Graph
graph = {
    'A': ['B', 'C'],
    'B': ['D', 'E'],
    'C': ['F'],
    'D': [],
    'E': ['F'],
    'F': []
}

# Run BFS
start, goal = 'A', 'F'
path = bfs(graph, start, goal)
print("Path found:", path)

--------
